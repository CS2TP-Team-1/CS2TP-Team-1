@extends('layouts.default')
@section('title', 'Create a Product')

@section('content')
    <h1>Create a New Product</h1>

    <form action="{{ route('products.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <label for="name">Product Name</label>
        <input type="text" name="name" placeholder="Product Name" required>

        <label for="price">Price</label>
        <input type="number" name="price" placeholder="##.##" required>

        <p>On promotion?</p>
        <label for="1">Yes</label>
        <input type="radio" value="1" name="promotion">
        <label for="0">No</label>
        <input type="radio" value="0" name="promotion">

        <p>Metal Type</p>
        <label for="silver">Silver</label>
        <input type="radio" value="silver" name="metalType">
        <label for="gold">Gold</label>
        <input type="radio" value="gold" name="metalType">

        <p>Category</p>
        <label for="earrings">Earrings</label>
        <input type="radio" value="earrings" name="category">
        <label for="necklaces">Necklaces</label>
        <input type="radio" value="necklaces" name="category">
        <label for="watches">Watches</label>
        <input type="radio" value="watches" name="category">
        <label for="bracelets">Bracelets</label>
        <input type="radio" value="bracelets" name="category">
        <label for="rings">Rings</label>
        <input type="radio" value="rings" name="category">
        <br>
        <label for="description">Product Description</label>
        <textarea name="description"></textarea>
        <br>
        <label for="mainImage">Upload Main Product Image</label>
        <input type="file" id="mainImage" name="mainImage">
        <br>
        <input type="submit">


    </form>
@endsection
