@php use App\Models\Product; @endphp
@extends('layouts.default')
@section('title', 'Reviews Dashboard')

@section('content')
    <h1>Reviews</h1>
    @if($reviews->isEmpty())
        <h2>There are no reviews. </h2>
    @else
        <table class="table">
            <thead>
            <th>Review ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Review Title</th>
            <th>Rating</th>
            <th>Content</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                @php
                    $product = Product::findOrFail($review->product_id);
                @endphp
                <tr>
                    <td>{{$review->id}}</td>
                    <td>{{$review->product_id}}</td>
                    <td><a href="/products/{{$review->product_id}}">{{$product->name}}</a></td>
                    <td>{{$review->title}}</td>
                    <td>{{$review->rating}}</td>
                    <td>{{$review->content}}</td>
                    <td class="table-button-section">
                        <button class="button table-button"
                                onclick="location.href='/admin/reviews/delete/{{$review->id}}'">Delete
                        </button>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endif

@endsection
