@extends('layouts.default')
@section('title', 'Home')
@php
    use App\Models\Product;
@endphp

@section('content')
    <h2>Product Categories</h2>
    <ul class="catagories">
    <a href="/products?searchQuery=&category=rings&metalType="> <img src="/images/homepage/ring.png" alt="Rings" class="productImg" width="235" height="235"></a>
    <a href="/products?searchQuery=&category=bracelets&metalType="><img src="/images/homepage/bracelet.png" alt="Bracelets" class="productImg" width="235" height="235"></a>
    <a href="/products?searchQuery=&category=earrings&metalType="><img src="/images/homepage/earrings.png" alt="Earrings" class="productImg" width="235" height="235"></a>
    <a href="/products?searchQuery=&category=watches&metalType="><img src="/images/homepage/wristwatch.png" alt="Watches" class="productImg" width="235" height="235"></a>
    <a href="/products?searchQuery=&category=necklaces&metalType="><img src="/images/homepage/pearl-necklace.png" alt="Necklaces" class="productImg" width="235" height="235"></a>
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

                if (!\Illuminate\Support\Facades\File::exists($imgPath)) {
                    $imgPath = "/images/image_unavailable.png";
                }
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
