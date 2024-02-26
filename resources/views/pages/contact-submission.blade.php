@extends('layouts.default')
@section('title', 'contact_submission')
@php
    use App\Models\ContactForm;
@endphp

@section('content')
    <h2>Contact Submissions</h2>

    <div class="CSform">
    <form class="submissions-form">
    <table>
        <thead>
        <th>Name</th>
        <th>Email address</th>
        <th>message</th>
        </thead>
            <tr>
                <td>name</td>
                <td>email</td>
                <td>message</td>
            </tr>
        

    </table>
    </form>
    </div>
@endsection
