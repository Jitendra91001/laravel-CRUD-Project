@extends('layouts.user_layout')
@section('content')
<div class="row h-100" >
        <div class="card my-5 mx-auto" style="border:none;">
            <div class="card-body">
                <h4 class="card-title text-center">All Users</h4>
                <a  class="btn btn-success" href="{{route('curd.create')}}">Registration</a>
                <hr>
                @include('flashdata')
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Contact</td>
                        <td>Gender</td>
                        <td>Hobbies</td>
                        <td>Address</td>
                        <td>Country</td>
                        <td style="text-align:center;">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($alldata as $users)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$users->first_name}}</td>
                        <td>{{$users->last_name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->contact}}</td>
                        <td>
                            @if($users->gender=="M")
                            Male
                            @elseif($users->gender=="F")
                            Female
                            @elseif($users->gender=="O") 
                            Other   
                            @endif
                        </td>
                        <td>{{$users->hobbies}}</td>
                        <td>{{$users->address}}</td>
                        <td>{{$users->country}}</td>
                        <td>
                            <a  class="btn btn-warning btn-sm p-0" href="{{route('curd.show',['curd'=>$users->id])}}">show</a>
                            <a  class="btn btn-success btn-sm p-0" href="{{route('curd.edit',['curd'=>$users->id])}}">Edit</a>
                            <form method="POST" action="{{route('curd.destroy',['curd'=>$users->id])}}">
                                @csrf
                            @method('DELETE')
                            <input type="submit"  class="btn btn-danger btn-sm p-0" style="width:40px; float:right;transform:translateX(-5px);" value="DELETE"/>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>Data not found</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                {{$alldata->links()}}
        </div>
    </div>
</div>
@endsection