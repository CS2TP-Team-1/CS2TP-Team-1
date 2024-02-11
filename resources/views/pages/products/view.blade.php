@extends('layouts.default')
@section('title', $product->name)

@section('content')
    @php
        $imgPath = '/images/products/' . $product->mainImage;
    @endphp

    <h1> {{$product->name}} </h1>

    <div id="product-block">
        <div id="product-view-container">
            <div id="product-view-container-image">
                <img src="{{ $imgPath }}" alt="Image of the Product" width="400px" id="product-view-image">
            </div>
            <div id="product-view-container-info">
                <h3>£{{$product->price}}</h3>
                <p>{{$product->description}}</p>
                <button class="button">Add to Basket</button>
            </div>

        </div>
    </div>  
@endsection
