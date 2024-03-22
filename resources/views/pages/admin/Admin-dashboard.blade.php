@extends('layouts.default')
@section('title', 'Admin Dashboard')

@section('content')
    <h2>Admin Dashboard</h2>
    <div class="form">
        <div class="account-form">
            <p>Manage and Edit Products:</p><br>
            <button class="button" onclick="location.href='/admin/products'">Manage Products</button>

            <p>Manage and Edit Users:</p><br>
            <button class="button" onclick="location.href='/admin/users'">Manage Users</button>

            <p>Manage and Edit Orders:</p><br>
            <button class="button" onclick="location.href='/admin/orders'">Manage Orders</button>

            <p>Manage and Edit Discount Codes:</p><br>
            <button class="button" onclick="location.href='/admin/discounts'">Manage Discounts</button>

            <p>View Contact Submissions:</p><br>
            <button class="button" onclick="location.href='/admin/contact'">Manage Contact Submissions</button>

            <p>Manage Returns:</p><br>
            <button class="button" onclick="location.href='/admin/returns'">Manage Returns</button>

            <p>Manage Reviews:</p><br>
            <button class="button" onclick="location.href='/admin/reviews'">Manage Reviews</button>
        </div>
    </div>
@endsection
