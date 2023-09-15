@extends('layout.erp.app')

@section('page')

<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
        <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 30%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
            User Information Form
        </div>
            @if($user == "")
            <form action="{{route('users.store')}}" class="col-md-12" method="post" enctype="multipart/form-data">
                @csrf
                @else
                <form action="{{route('users.update', $user->id)}}" class="col-md-12" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="@if($user !='') {{$user->name}} @endif" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="@if($user !='') {{$user->email}} @endif" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" name="mobile" class="form-control" value="@if($user !='') {{$user->mobile}} @endif" placeholder="Enter mobile number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if(($user ==''))
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            @if(($user ==''))
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" class="form-control">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="btn-group">
                            <a href="{{route('users.index')}}" class="btn btn-danger mt-3 mb-3" style="margin-left:100%;">Cancel</a>
                            <button class="btn btn-success mt-3 mb-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection