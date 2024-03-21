@php use Illuminate\Support\Facades\File; @endphp
@extends('layouts.default')
@section('title', 'Products')

@section('content')
    <form action="{{ route('products.index') }}" method="GET" class="search-form">
        <input type="text" id="searchQuery" name="searchQuery" placeholder="Search for jewellery..."
               class="search-form-input">
        <select id="category" name="category" class="search-form-input">
            <option value="">Select Category</option>
            <option value="necklaces">Necklaces</option>
            <option value="earrings">Earrings</option>
            <option value="rings">Rings</option>
            <option value="bracelets">Bracelets</option>
            <option value="watches">Watches</option>
        </select>
        <select id="metalType" name="metalType" class="search-form-input">
            <option value="">Select Metal Type</option>
            <option value="gold">Gold</option>
            <option value="silver">Silver</option>

        </select>
        <input type="submit" value="Search" class="button" style="width: 100%">
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
            $imgPath = "/images/products/" . $product->mainImage;

//            if (!File::exists($imgPath)) {
//                $imgPath = "/images/image_unavailable.png";
//            }
        @endphp

        <div id="product-info">
            <img src="{{ $imgPath }}" alt="Product Image" class="product-gallery-image">
            <h3>{{$product->name }}</h3>
            <p>£{{ $product->price }}</p>
            <p><a href="/products/{{$product->id}}">View Product Details</a></p>
        </div>
    @endforeach

@endsection
