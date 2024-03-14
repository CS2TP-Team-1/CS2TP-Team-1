@extends('layouts.default')
@section('title', '500 - Server Error')

@section('content')

    <h1>Error 500: Oops! There was an error</h1>
    <h3>Something went wrong! Please check the url and try again.</h3>
    <div class="form">
        <button class="button" onclick="history.back()">Go Back!</button>
    </div>
@endsection
