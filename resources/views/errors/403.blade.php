@extends('layouts.default')
@section('title', '403 - Unauthorised Action')

@section('content')

    <h1>Error 403: Oops! Unauthorised Action</h1>
    <h3>It looks like you aren't authorised to access that page.</h3>
    <div class="form">
        <button class="button" onclick="history.back()">Go Back!</button>
    </div>

    <p></p>
    <div class="form">
        @if (!\Illuminate\Support\Facades\Auth::check())
            <a href="{{ route('login') }}"> <button class="button">Login</button></a>
        @endif
    </div>
@endsection
