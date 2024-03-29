@extends('layouts.default')
@section('title', 'Contact Form Submissions')
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
                <th>Email Address</th>
                <th>Message</th>
                </thead>
                @foreach($forms as $form)
                    <tr>
                        <td>{{$form->name}}</td>
                        <td>{{$form->email}}</td>
                        <td>{{$form->message}}</td>
                    </tr>

                @endforeach

            </table>
        </form>
    </div>
@endsection
