@extends('layouts.default')
@section('title', 'Login')

@section('content')
    <form id="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Sign In</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="{{old('email')}}">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Sign In</button>
        <p><a href="/register">Need an account?</a></p>
    </form>
@endsection
