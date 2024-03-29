@extends('layouts.default')
@section('title', 'Login')

@section('content')
    <form id="login-form" autocomplete="on" method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Sign In</h2>
        @foreach($errors->all() as $message)
            <p class="error">{{$message}}</p>
        @endforeach
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="{{old('email')}}">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="button">Sign In</button>
        <p><a href="/register">Need an account?</a></p>
    </form>
@endsection
