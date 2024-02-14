@extends('layouts.default')
@section('title', 'Users Dashboard')

@section('content')
    <section class="admin">
        <div class="table">
            <div class="table-body">
                <h4 class="table-title">
                    Registered Users
                    <a href="" class="btn btn-AE" style="float:right; margin-top: -12px;">Add new user</a>

                </h4>

                <table class="table-table-stripped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Account type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->accountType}}</td>
                            <td>
                                <a href="" class="btn btn-AE btn-sm">Edit</a>
                                <a href="" class="btn btn-delete btn-sm">Delete</a>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </section>



@endsection
