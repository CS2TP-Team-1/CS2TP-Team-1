@extends('layouts.default')
@section('title', 'Return #' . $return->id)

@php
    $product = \App\Models\Product::findOrFail($return->product_id);
@endphp

@section('content')
    <h1> Return #{{ $return->id }}</h1>
    <h3> Total Value of Return: £{{ $return->returnValue }}</h3>
    <h3>Return Status: {{ $return->status }}</h3>
    <div class="form">
        @if ($return->status == 'Requested')
            <button class="button" onclick="location.href='/admin/returns/{{ $return->id }}/approve'">Approve Return</button>
            <button class="button" style="margin: 10px" onclick="location.href='/admin/returns/{{ $return->id }}/deny'">Deny Return</button>
        @endif
    </div>
    <br>
    <h2>Your Order Contents:</h2>
    <div class="form">
        <form class="account-form">
            <table class="table">
                <thead>
                    <th>Product Image</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                </thead>
                @php
                    $imgPath = '/images/products/' . $product->mainImage;
                @endphp
                <tr>
                    <td><img src="{{ $imgPath }}" alt="Image of the Product" width="100px" id="product-view-image"></td>
                    <td>{{ $product->id }}</td>
                    <td><a target="_blank" href="/products/{{ $product->id }}">{{ $product->name }} </a></td>
                    <td>£{{ $product->price }}</td>
                </tr>

            </table>

        </form>
    @endsection
