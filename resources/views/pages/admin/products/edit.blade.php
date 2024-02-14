@extends('layouts.default')
@section('title', 'Edit Product #'.$product->id)

@section('content')
    <h1>Edit Product #{{$product->id}}</h1>

    <form class="new-product-form" method="post" action="{{route('admin.edit-products')}}">
        @csrf
        @method('PATCH')
        @foreach($errors->all() as $message)
            <p>{{$message}}</p>
        @endforeach

        <input name="id" required hidden value="{{$product->id}}">
        <label>
            Product Name:
            <input type="text" required name="name" value="{{$product->name}}">
        </label>
        <br>
        <label>
            Price:
            <input type="number" required step="0.01" name="price" value="{{$product->price}}">
        </label>
        <br>
        <label>
            Stock Amount:
            <input type="number" required name="stock" value="{{$product->stock}}">
        </label>
        <br>
        <label>
            On promotion?
            <label for="1">Yes
                <input type="radio" value="1" name="promotion" @if($product->promotion === 1) checked @endif>
            </label>
            <label for="0">No
                <input type="radio" value="0" name="promotion" @if($product->promotion === 0) checked @endif>
            </label>
        </label>
        <br>
        <label>
            Product Description:
            <br>
            <textarea name="description" cols="30" rows="5" required>{{$product->description}}</textarea>
        </label>
        <br>
        <button class="button" type="submit">Update Product</button>
    </form>
@endsection
