@extends('layouts.user_layout')
@section('content')
<div class="album py-5" style="height:120vh;">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="card border-success" style="max-width: 65rem;padding: 2%;">
            <h2> Update User Details </h2>
            <hr>
            <div class="card-body">
                <form method="POST" action="{{route('curd.update',['curd'=>$curd->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <div class="col">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="enter name"
                                   required="" value="{{$curd->first_name}}" >
                        </div>
                        <div class="col">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="enter last name"
                                   required="" value="{{$curd->last_name}}" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="name@example.com" required="" value="{{$curd->email}}" >
                        </div>
                        <div class="col">
                            <label for="mobile" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="contact" name="contact"
                                   placeholder="9918078367" required="" value="{{$curd->contact}}" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="gender" class="form-label">Gender</label><br>
                            <input type="radio" id="gender" name="gender" value="M" @if($curd->gender == "M") checked @endif disabled>Male
                            <input type="radio" id="gender" name="gender" value="F" @if($curd->gender == "F") checked  @endif disabled>Female
                        </div>
                        <div class="col">
                            <label for="hobbies" class="form-label">Hobbies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" 
                                       name="hobbies[]" value="Travelling"  @if(in_array('Travelling' , $curd->hobbies_array)) checked @endif >
                                <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox"
                                       name="hobbies[]" value="Music" @if(in_array('Music' , $curd->hobbies_array)) checked @endif >
                                <label class="form-check-label" for="inlineCheckbox2">Music</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                       name="hobbies[]" value="Coding" @if(in_array('Coding' , $curd->hobbies_array)) checked @endif >
                                <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3" name="address"
                                      placeholder="address" required="" >{{$curd->address}}     `1 </textarea>
                        </div>
                        <div class="col">
                            <label for="inputCountry" class="form-label">Country</label>
                            <input type="text" name="country" id="inputCountry" 
                                    required=""  value="{{$curd->country}}">
                                {{-- <option selected disabled>Select</option>
                                @foreach ($countrys as $item)
                                <option>{{$item['countryname']}}</option> 
                                @endforeach --}}
                                

                            {{-- </select> --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="profile" class="form-label">Profile</label><br>
                            <img src="{{url('profile') . '/' . $curd->profile}}" alt="Profile Img" style="height:200px;width:200px;border-radius:50%;"/>
                             <input type="file" class="form-control-file" name="profile" id="profile">
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <input type="submit" name="update" id="update" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    @endsection