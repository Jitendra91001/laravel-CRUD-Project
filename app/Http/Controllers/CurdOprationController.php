<?php

namespace App\Http\Controllers;

use App\Models\curdOpration;
use Illuminate\Http\Request;
use App\Models\country;

class CurdOprationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = curdOpration::paginate(3);
        return view('index',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $countrys=country::all();
        return view('ragistration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'first_name'=> 'required|min:5|max:10',
        //     'last_name' => 'required|min:5|max:10|different:first_name',
        //     'email'=> 'required|email|unique:curd_oprations,email',
        //     'contact'=>  'required|nullable|max:10',
        //     'gender'=>'required',
        //     'hobbies'=>'required|array',
        //     'address'=>'required|nullable',
        //     'country'=>'required',
        //     'profile'=>'required|mimes:jpg,jpeg,png'
            
        // ]);
        $requestData=$request->except(['_token','regist']);
        // imgcode start
        $imgName = 'lv_'.rand().'.'.$request->profile->extension();
        $request->profile->move(public_path('profile/'),$imgName);
        $requestData['profile'] = $imgName;
        //end
        // dd($requestData['profile']);
        // die;
        $store = curdOpration::create($requestData);
        return redirect()->route('curd.index')->with('success',"data is inserted successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\curdOpration  $curdOpration
     * @return \Illuminate\Http\Response
     */
    public function show(curdOpration $curd)
    {
        // dd($curd->profile);
        // exit;
        return view('show',compact('curd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\curdOpration  $curdOpration
     * @return \Illuminate\Http\Response
     */
    public function edit(curdOpration $curd)
    { 
        return view('edit',compact('curd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\curdOpration  $curdOpration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, curdOpration $curd)
    {
        $curd->first_name = $request->first_name ?? $curd->first_name;
        $curd->last_name = $request->last_name ?? $curd->last_name;
        $curd->email = $request->email ?? $curd->email;
        $curd->contact = $request->contact ?? $curd->contact;
        $curd->gender = $request->gender ?? $curd->gender;
        $curd->hobbies = $request->hobbies ?? $curd->hobbies_array;
        $curd->address = $request->address ?? $curd->address;
        $curd->country = $request->country ?? $curd->country;
        if(isset($request->profile)){
            $imgName = 'lv_'.rand().'.'.$request->profile->extension();
            $request->profile->move(public_path('profile/'),$imgName);
            $curd->profile = $imgName;
        }
        $curd->save();
        return redirect()->route('curd.index')->with('danger',"data is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\curdOpration  $curdOpration
     * @return \Illuminate\Http\Response
     */
    public function destroy(curdOpration $curd)
    {
        $curd->delete();
        return redirect()->route('curd.index')->with('danger',"data is deleted successfully");

    }
}
