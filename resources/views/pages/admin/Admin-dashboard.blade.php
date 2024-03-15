@extends('layouts.default')
@section('title', 'Admin dashboard')

@section('content')
    <h2>Admin Dashboard</h2>
    <div class="form">
        <div class="account-form">
            <p>Manage and edit products:</p><br>
            <button class="button" onclick="location.href='/admin/products'">Manage products</button>

            <p>Manage and edit users:</p><br>
            <button class="button" onclick="location.href='/admin/users'">Manage users</button>

            <p>Manage and edit orders :</p><br>
            <button class="button" onclick="location.href='/admin/orders'">Manage orders</button>

            <p>Manage and edit discount codes :</p><br>
            <button class="button" onclick="location.href='/admin/discounts'">Manage discounts</button>

            <p>Manage and edit contact submissions :</p><br>
            <button class="button" onclick="location.href='/admin/contact'">Manage contact submissions</button>

            <p>Manage and edit returns :</p><br>
            <button class="button" onclick="location.href='/admin/returns'">Manage returns</button>
        </div>
    </div>
@endsection
