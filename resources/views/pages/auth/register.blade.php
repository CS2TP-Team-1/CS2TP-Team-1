@extends('layouts.default')
@section('title', 'Register')

@section('content')
    <div class="signup-f">
        <form class="register" action="{{ route('register-store') }}" method="post">
            @csrf
            <h1>Register</h1>

            <label for="name">Name:</label> <br>
            <input type="text" name="name" value="<?php echo isset($errors) ? old('name') : ''; ?>" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="<?php echo isset($errors) ? old('name') : ''; ?>" required><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br>
            <label for="password_confirmation">Confirm password:</label><br>
            <input type="password" name="password_confirmation" required><br>

            <button type="submit">Register</button>
            <br>


        </form>
    </div>
@endsection
