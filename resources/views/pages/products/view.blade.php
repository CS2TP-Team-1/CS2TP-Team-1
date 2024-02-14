@extends('layouts.default')
@section('title', $product->name)

@section('content')
    @php
        $imgPath = '/images/products/' . $product->mainImage;
    @endphp

    <h1> {{$product->name}} </h1>

    <div id="product-view-container">
        <div id="product-view-container-image">
            <img src="{{ $imgPath }}" alt="Image of the Product" width="400px" id="product-view-image">
        </div>
        <div id="product-view-container-info">
            <h3>£{{$product->price}}</h3>
            <p>{{$product->description}}</p>

            @if(\Illuminate\Support\Facades\Auth::check())
                <button class="button" onclick="location.href='{{route('add-to-basket', $product->id)}}'">Add to Basket</button>
            @else
                <button class="button" onclick="location.href='{{route('login')}}'">You must be logged in to add to basket.</button>
            @endif

            @if(session('success') === 'product-added')
                <p>This product has been added to your basket!</p>
            @endif

        </div>

    </div>
@endsection
