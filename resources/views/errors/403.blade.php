@extends('layouts.default')
@section('title', '403 - Unauthorised Action')

@section('content')

    <h1>Error 403: Oops! Unauthorised Action</h1>
    <h3>It looks like you aren't authorised to access that page.</h3>
    <button class="button" onclick="history.back()">Go Back!</button>

@endsection
