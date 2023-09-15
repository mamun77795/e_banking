@extends('layout.erp.app')

@section('page')

<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->account_type}}</td>
                    <td style="display: flex;">
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-secondary">Edit</a>
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf                          
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

@endsection