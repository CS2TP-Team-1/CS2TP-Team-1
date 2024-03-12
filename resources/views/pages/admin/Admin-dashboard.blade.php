@extends('layouts.default')
@section('title', 'Admin dashboard')

@section('content')
    <h2>Admin Dahsboard</h2>
    <div class="contact-c">
        <div class="contact">
       

            <div class="contact-form" >
                
                <label>Manage and edit products:</label><br>
                <button class="button" onclick="location.href='/admin/products'">Manage products</button>

                <label>Manage and edit users:</label><br>
                <button class="button" onclick="location.href='/admin/users'">Manage users</button>
    
                <label>Manage and edit orders :</label><br>
                <button class="button" onclick="location.href='/admin/orders'">Manage orders</button>

                <label>Manage and edit discount codes :</label><br>
                <button class="button" onclick="location.href='/admin/discounts'">Manage discounts</button>

                <label>Manage and edit contact submissions :</label><br>
                <button class="button" onclick="location.href='/admin/contact'">Manage contact submissions</button>

                <label>Manage and edit returns :</label><br>
                <button class="button" onclick="location.href='/admin/returns'">Manage returns</button>
            </div>

        </div>
    </div>

@endsection