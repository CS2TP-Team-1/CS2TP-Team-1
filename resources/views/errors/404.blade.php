@extends('layouts.default')
@section('title', '404 - Not Found')

@section('content')

    <h1>Error 404: Oops! Page not found</h1>
    <h3>The page you are looking for cannot be found.</h3>
    <div class="form">
        <button class="button" onclick="history.back()">Go Back!</button>
    </div>

@endsection
