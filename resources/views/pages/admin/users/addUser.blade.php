@extends('layouts.default')
@section('title', 'add-users')

@section('content')
    <div class="AddUser">
        <h3>Add new user</h3>
        <form class="add-form" action="{{route('admin.addUser')}}" method="post"><br>
            @csrf
            @foreach($errors->all() as $message)
                <p>{{$message}}</p>
            @endforeach
            <label for="name">Name:</label> <br>
            <input type="text" name="name" value="{{old('name')}}" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="{{old('email')}}" required><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br>
            <label for="password_confirmation">Confirm password:</label><br>
            <input type="password" name="password_confirmation" required><br>

            <button type="submit" class="button">Add User</button>
            <br>

        </form>

    </div>


@endsection
