@extends('layouts.default')
@section('title', 'Your Order')

@php
    $theOrder = \App\Models\Order::find($order->id);

@endphp

@section('content')

    <h1> Order #{{$order->id}}</h1>
    <h2> Order Status: {{$order->status}}</h2>
    <h3> Total Value of Order: £{{$order->totalValue}}</h3>
<br>
    <h2>Your Order Contents:</h2>
    <table>
        <thead>
        <th>Product Image</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
        </thead>
        @foreach($theOrder->products as $product)
            @php
                $imgPath = '/images/products/' . $product->mainImage;
            @endphp
            <tr>
                <td><img src="{{ $imgPath }}" alt="Image of the Product" width="100px" id="product-view-image"></td>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>£{{$product->price}}</td>
            </tr>
        @endforeach

    </table>
@endsection
