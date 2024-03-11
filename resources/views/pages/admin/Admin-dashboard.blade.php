@extends('layouts.default')
@section('title', 'Admin dashboard')

@section('content')
    <h2>Admin Dahsboard</h2>
    <div class="contact-c">
        <div class="contact">
       

            <form class="contact-form" >
                @csrf
                <label>Tell us your name:</label> <br>
                <input type="text" required name="name" value="{{old('name')}}"/><br>


                <label for="email">Email:</label><br>
                <input type="email" required name="email" value="{{old('email')}}"/> <br>
    

                <label for="message">Message:</label><br>
                <textarea name="message" required rows="15" cols="40" >{{old('message')}}</textarea><br>


                <button type="submit" class="button">Submit</button>
                <br>
            </form>

        </div>
    </div>

@endsection