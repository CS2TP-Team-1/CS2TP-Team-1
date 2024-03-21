@extends('layouts.default')
@section('title', 'Admin Dashboard')

@section('content')
    <h2>Admin Dashboard</h2>
    <div class="form">
        <div class="account-form">
            <p>Manage and edit products:</p><br>
            <button class="button" onclick="location.href='/admin/products'">Manage Products</button>

            <p>Manage and edit users:</p><br>
            <button class="button" onclick="location.href='/admin/users'">Manage Users</button>

            <p>Manage and edit orders :</p><br>
            <button class="button" onclick="location.href='/admin/orders'">Manage Orders</button>

            <p>Manage and edit discount codes :</p><br>
            <button class="button" onclick="location.href='/admin/discounts'">Manage Discounts</button>

            <p>Manage and edit contact submissions :</p><br>
            <button class="button" onclick="location.href='/admin/contact'">Manage Contact Submissions</button>

            <p>Manage and edit returns :</p><br>
            <button class="button" onclick="location.href='/admin/returns'">Manage Returns</button>
        </div>
    </div>
@endsection
