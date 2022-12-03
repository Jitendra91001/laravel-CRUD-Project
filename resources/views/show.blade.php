@extends('layouts.user_layout')
@section('content')
<div class="album py-5" style="height:120vh;">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="card border-success" style="max-width: 65rem;padding: 2%;">
            <h2> User Details </h2>
            <hr>
            <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="enter name"
                                   required="" value="{{$curd->first_name}}" disabled>
                        </div>
                        <div class="col">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="enter last name"
                                   required="" value="{{$curd->last_name}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="name@example.com" required="" value="{{$curd->email}}" disabled>
                        </div>
                        <div class="col">
                            <label for="mobile" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="contact" name="contact"
                                   placeholder="9918078367" required="" value="{{$curd->contact}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="gender" class="form-label">Gender</label><br>
                            <input type="radio" id="gender" name="gender" value="M" @if($curd->gender == "M") checked @endif disabled>Male
                            <input type="radio" id="gender" name="gender" value="F" @if($curd->gender == "F") checked @endif disabled>Female
                        </div>
                        <div class="col">
                            <label for="hobbies" class="form-label">Hobbies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" 
                                       name="hobbies[]" value="Travelling"  @if(in_array('Travelling' , $curd->hobbies_array)) checked @endif disabled>
                                <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox"
                                       name="hobbies[]" value="Music" @if(in_array('Music' , $curd->hobbies_array)) checked @endif disabled>
                                <label class="form-check-label" for="inlineCheckbox2">Music</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                       name="hobbies[]" value="Coding" @if(in_array('Coding' , $curd->hobbies_array)) checked @endif disabled>
                                <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3" name="address"
                                      placeholder="address" required="" disabled>{{$curd->address}}</textarea>
                        </div>
                        <div class="col">
                            <label for="inputCountry" class="form-label">Country</label>
                            <input type="text" name="country" id="inputCountry" 
                                    required="" disabled value="{{$curd->country}}">
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
                            <img src="{{url('profile') . '/' . $curd->profile }}" alt="Profile Img" style="height:200px;width:200px;border-radius:50%;"/>
                        </div>
                    </div>
                    <br>
            </div>
        </div>
    </div>
</div>



    @endsection