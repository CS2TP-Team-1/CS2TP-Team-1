@extends('layouts.default')
@section('title', 'Admin dashboard')

@section('content')
    <h2>Admin Dahsboard</h2>
    <div class="contact-c">
        <div class="contact">
       

            <form class="contact-form" >
                
                <label>Manage and edit products:</label><br>
                <a href="products/edit" class="button" role="button">Manage products</a>

                <label>Manage and edit users:</label><br>
                <button type ="submit" class="button">Submit</button><br>
    

                <label>Manage and edit orders :</label><br>
                <button type="submit" class="button">Submit</button><br>

                <label>Manage and edit discount codes :</label><br>
                <button type="submit" class="button">Submit</button><br>

                <label>Manage and edit contact submissions :</label><br>
                <button type="submit" class="button">Submit</button><br>
            </form>

        </div>
    </div>

@endsection