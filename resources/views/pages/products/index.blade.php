@extends('layouts.default')
@section('title', 'Products')

@section('content')
<form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search products">
        <button type="submit">Search</button>
    </form>

    <!-- Display the search results if available -->
    @if(isset($search))
        <p>Search results for: <strong>{{ $search }}</strong></p>
    @endif

    @if($products->isEmpty())
        <h2>There are no products. </h2>
    @endif

    @foreach ($products as $product)

    @php
        $imgPath = "images/products/" . $product->mainImage;
    @endphp

    <div id="product-info">
        <img src="{{ $imgPath }}" alt="Product Image" class="product-gallery-image">
        <h3>{{$product->name }}</h3>
        <p>£{{ $product->price }}</p>
        <p><a href="/products/{{$product->id}}">View Product Details</a></p>
    </div>
    @endforeach

    @endsection
