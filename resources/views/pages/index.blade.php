@extends('layouts.default')
@section('title', 'Home')
@php
    use App\Models\Product;
@endphp

@section('content')
    <h2>Product Categories</h2>
    <a href="/products?searchQuery=&category=rings&metalType="> <img src="/images/homepage/ring.jpg" alt="Rings" class="productImg"></a>
    <a href="/products?searchQuery=&category=bracelets&metalType="><img src="/images/homepage/bracelet.png" alt="Bracelets" class="productImg"></a>
    <a href="/products?searchQuery=&category=earrings&metalType="><img src="/images/homepage/earring.jpg" alt="Earrings" class="productImg"></a>
    <a href="/products?searchQuery=&category=watches&metalType="><img src="/images/homepage/watch.jpg" alt="Watches" class="productImg"></a>
    <a href="/products?searchQuery=&category=necklaces&metalType="><img src="/images/homepage/necklace.jpg" alt="Necklaces" class="productImg"></a>
    <!-- simple search code fe -->


    <h2>Best-selling Items</h2>
    @php
        $bestsellingProducts = Product::where('promotion', '=', 1)->get();
    @endphp
    <div id="product_container">
        @if ($bestsellingProducts->isEmpty())
            <h2>There are no best-selling products at the moment. </h2>
        @endif

        @foreach ($bestsellingProducts as $product)
            @php
                $imgPath = "/images/products/" . $product->mainImage;
            @endphp

            <div id="product-info">
                <img src="{{$imgPath}}" alt="Product Image"
                     class="product-gallery-image">
                <h3>{{$product->name }}</h3>
                <p>£{{$product->price }}</p>
                <p><a href="/products/{{$product->id}}">View Product
                        Details</a></p>
            </div>
    @endforeach

    </div>

@endsection
