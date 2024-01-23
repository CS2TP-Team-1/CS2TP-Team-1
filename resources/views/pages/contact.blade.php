@extends('layouts.default')
@section('title', 'Products')

@section('content')
    <div class="contact-c">
        <div class="contact">
            <header>
                <h1>Contact Us</h1>
                <p>Complete the form below and we will get back to you within 24 hours.</p>
            </header>

            <form class="contact-form" action="{{ url('contact')}}" method="POST">
                @csrf
                <label for="name">Tell us your name:</label> <br>
                <input type="text" name="name"/><br>
                <label for="email">Email:</label><br>
                <input type="text" name="email"/> <br>
                <label for="message">Message:</label><br>
                <textarea name="message" rows="15" cols="40"></textarea><br>
                <button type="submit">Submit</button>
                <br>
            </form>
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
                    <p>jewellerystore@gmail.com</p>
                </div>
            </div>
        </div>

    </div>
@endsection
