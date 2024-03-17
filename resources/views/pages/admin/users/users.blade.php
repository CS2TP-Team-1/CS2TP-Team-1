@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.default')
@section('title', 'Users Dashboard')

@section('content')
    <section class="admin">

        <div class="table">
            <div class="table-body">
                <h1>
                    Registered Users
                </h1>
                <div class="form">
                    <button class="button" onclick="location.href='/admin/addUser'">Add new user</button>
                </div>
                <div class="form">
                    <table class="table-table-stripped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Account type</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->accountType == 1 ? 'Admin' : 'User' }}</td>
                                <td>
                                    @if ($user->id == Auth::id())
                                        <p>Changes not permitted</p>
                                    @else
                                        <a href="{{ url('/admin/users/edit/' . $user->id) }}"
                                           class="btn btn-AE btn-sm">Edit</a>
                                        <a onclick="return confirm('Continue to delete the user')"
                                           href="{{ url('/admin/delete/' . $user->id) }}"
                                           class="btn btn-delete btn-sm">Delete</a>
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
