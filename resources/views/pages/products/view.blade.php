@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.default')
@section('title', $product->name)

@section('content')
    @php
        $imgPath = '/images/products/' . $product->mainImage;

        if ($product->stock == 0){
            $stockLevel = 'Out of Stock';
        } elseif ($product->stock < 10){
            $stockLevel = 'Low Stock';
        } else {
            $stockLevel = 'In Stock';
        }

        $cart = session()->get('cart');
        if (isset($cart[$product->id])){
        $remainingStock = $product->stock - $cart[$product->id]['quantity'];
        } else {
            $remainingStock = $product->stock;
        }
    @endphp

    <h1> {{ $product->name }} </h1>

    <div id="product-block">
        <div id="product-view-container">
            <div id="product-view-container-image">
                <img src="{{ $imgPath }}" alt="Image of the Product" width="400px" id="product-view-image">
            </div>
            <div id="product-view-container-info">
                <h3>£{{ $product->price }}</h3>
                <h4>Stock Level: {{$stockLevel}}</h4>
                <p>{{ $product->description }}</p>
                @if (Auth::check() && $product->stock > 0 && $remainingStock > 0)
                    <button class="button" onclick="location.href='{{ route('add-to-basket', $product->id) }}'">Add to
                        Basket
                    </button>
                @elseif(Auth::check() && $product->stock == 0)
                    <button class="button-out-of-stock">This item is out of stock!</button>
                @elseif(Auth::check() && $remainingStock == 0)
                    <button class="button-out-of-stock-basket" onclick="location.href='{{ route('basket.show') }}'">All remaining stock is in your basket!</button>
                @else
                    <button class="button" onclick="location.href='{{ route('login') }}'">You must be logged in to add
                        to
                        basket.
                    </button>
                @endif

                @if (session('success') === 'product-added')
                    <p>This product has been added to your basket!</p>
                @endif
                @if(session('failed') === 'no-stock')
                    <p>There is not enough remaining stock to add this item to the basket again.</p>
                @endif
            </div>
        </div>
    </div>

    <h2>Reviews</h2>
    <div class="form">
        <form class="account-form">
            @foreach ($product->reviews as $review)
                <div class="review">
                    <h3>@if($review->user === null)
                            [Account Deleted]
                        @else
                            {{ $review->user->name }}
                       @endif
                        </h3>
                    <h4>{{ $review->title }} | {{ $review->rating }}/5</h4>
                    <p>{{ $review->contents }}</p>
                    @if (Auth::check() && Auth::user()->id == $review->user_id)
                        <button class="button" onclick="location.href='/reviews/delete/{{$review->id}}'">Delete</button>
                    @endif
                </div>
            @endforeach
        </form>
    </div>

    <h2>Write your own review</h2>
    @auth
        @forelse ($product->reviews as $review)
            @if (Auth::user()->id == $review->user_id)
                <div class="form">
                    <form class="account-form">
                        <p>You cannot submit more than one review</p>
                    </form>
                </div>
            @else
                <div class="form">
                    <form class="account-form" method="POST" action="{{ url('/reviews') }}">
                        @csrf
                        @foreach ($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <label for="title">Review Title:</label>
                        <br>
                        <input type="text" required name="title" id="title" placeholder="Review Title" >
                        <br>
                        <label for="rating">Rating:</label>
                        <br>
                        <select name="rating" required id="rating">
                            <option value="1" @if(old('rating') === 1)selected @endif>1</option>
                            <option value="2" @if(old('rating') === 2)selected @endif>2</option>
                            <option value="3" @if(old('rating') === 3)selected @endif>3</option>
                            <option value="4" @if(old('rating') === 4)selected @endif>4</option>
                            <option value="5" @if(old('rating') === 5)selected @endif>5</option>
                        </select>
                        <br>
                        <label for="contents">Review Contents (Optional):</label>
                        <br>
                        <textarea name="contents" id="contents" rows="4">{{old('contents')}}</textarea>
                        <br>
                        <button class="button" type="submit">Submit Review</button>
                    </form>
                </div>
            @endif
        @empty
            <div class="form">
                <form class="account-form" method="POST" action="{{ url('/reviews') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label for="title">Review Title:</label>
                    <br>
                    <input type="text" name="title" required id="title" value="{{old('title')}}" placeholder="Review Title">
                    <br>
                    <label for="rating">Rating:</label>
                    <br>
                    <select name="rating" required id="rating">
                        <option value="1" @if(old('rating') === 1)selected @endif>1</option>
                        <option value="2" @if(old('rating') === 2)selected @endif>2</option>
                        <option value="3" @if(old('rating') === 3)selected @endif>3</option>
                        <option value="4" @if(old('rating') === 4)selected @endif>4</option>
                        <option value="5" @if(old('rating') === 5)selected @endif>5</option>
                    </select>
                    <br>
                    <label for="contents">Review Contents:</label>
                    <br>
                    <textarea name="contents" id="contents"  rows="4">{{old('contents')}}</textarea>
                    <br>
                    <button class="button" type="submit">Submit Review</button>
                </form>
            </div>
        @endforelse
    @endauth

    @guest
        <div class="form">
            <form class="account-form">
                <p>You must be signed in to write a review</p>
            </form>
        </div>
    @endguest

@endsection
