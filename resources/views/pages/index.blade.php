@extends('layouts.default')
@section('title', 'Home')
@php
    use App\Models\Product;
@endphp

@section('content')
    <h2>Product Categories</h2>
    <ul class="catagories">
    <a href="ring_search"> <img src="/images/homepage/ring.png" alt="Rings" class="productImg"></a>
    <a href="bracelet_search"><img src="/images/homepage/bracelet.png" alt="Bracelets" class="productImg"></a>
    <a href="earring_search"><img src="/images/homepage/earrings.png" alt="Earrings" class="productImg"></a>
    <a href="watch_search"><img src="/images/homepage/wristwatch.png" alt="Watches" class="productImg"></a>
    <a href="necklace_search"><img src="/images/homepage/pearl-necklace.png" alt="Necklaces" class="productImg"></a>
    </ul>
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
@endsection
