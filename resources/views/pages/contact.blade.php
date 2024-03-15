@extends('layouts.default')
@section('title', 'Contact Us')

@section('content')
    <div class="contact-c">
        <div class="contact">
            <header>
                <h1>Contact Us</h1>
                <p>Complete the form below and we will get back to you within 24 hours.</p>
            </header>

            <form class="contact-form" action="{{ route('contact-form.store')}}" method="POST">
                @csrf
                <label for="name">Tell us your name:</label> <br>
                <input type="text" required name="name" value="{{old('name')}}"/><br>
                @foreach($errors->get('name') as $message)
                    <p>{{$message}}</p>
                @endforeach

                <label for="email">Email:</label><br>
                <input type="email" required name="email" value="{{old('email')}}"/> <br>
                @foreach($errors->get('email') as $message)
                    <p>{{$message}}</p>
                @endforeach

                <label for="message">Message:</label><br>
                <textarea name="message" required rows="15" cols="40" >{{old('message')}}</textarea><br>
                @foreach($errors->get('message') as $message)
                    <p>{{$message}}</p>
                @endforeach

                <button type="submit" class="button">Submit</button>
                <br>
            </form>

            @if(session('status') === 'form-submitted')
                <p>Your message has been sent!</p>
            @endif
        </div>

        <div class="contact-info">
            <div class="contact-info-item">
                <div class="contact-info-icons">
                    <i class="fa fa-home"></i>
                </div>
                <div class="contact-info-content">
                    <h3>Address</h3>
                    <p>The Jewellery Store, Aston St<br/>
                        Birmingham
                    </p>
                </div>
            </div>
            <div class="contact-info-item">
                <div class="contact-info-icons">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="contact-info-content">
                    <h3>Phone</h3>
                    <p>+44(0)7544-987-654</p>
                </div>
            </div>
            <div class="contact-info-item">
                <div class="contact-info-icons">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="contact-info-content">
                    <h3>Email</h3>
                    <p>contact@thejewellerystore.com</p>
                </div>
            </div>
        </div>

    </div>
@endsection
