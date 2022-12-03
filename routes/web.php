<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurdOprationController;
use App\Models\curdOpration;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::resource('curd', CurdOprationController::class);
// type 1 route model binding sympal route model binding
// Route::get('users/{user}',function(\App\Models\curdOpration $users){
// echo "<pre>";
// dd($users);
// echo "</pre>";
// exit;
// });

// type 2 user difined column route model binding

// Route::get('users/{users:first_name}',function(\App\Models\curdOpration $users){
// echo "<pre>";
// dd($users);
// echo "</pre>";
// exit;
// });

// type3 using controller in route model binding
 Route::get('users/{users:first_name}',[CurdOprationController::class,'getuser'])->name('getuser');



