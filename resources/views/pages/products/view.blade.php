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
            <a href="{{route('add-to-basket', $product->id)}}">
                <p id="add-to-basket-button">Add to Basket</p>
            </a>
            @else
                <a href="{{ route('login') }}"> <p id="add-to-basket-button">You must be logged in to add to basket.</p> </a>
            @endif

            @if(session('success') === 'product-added')
                <p>This product has been added to your basket!</p>
            @endif

        </div>

    </div>
@endsection
