@extends('layouts.default')
@section('title', 'Create a Product')

@section('content')
    <h1>Create a New Product</h1>
    <div class="form">
        <form class='account-form' action="{{ route('admin.create-products') }}" enctype="multipart/form-data"
              method="POST">
            @csrf

            @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
            @endforeach
            <label for="name">
                Product Name
                <input type="text" name="name" placeholder="Product Name" value="{{old('name')}}" required>
            </label>

            <br>

            <label for="price">
                Price
                <input type="number" step='0.01' min="0" name="price" placeholder="##.##" value="{{old('price')}}"
                       required>
            </label>

            <br>

            <label for="stock">
                Stock Amount
                <input type="number" step="1" name="stock" min="0" value="{{old('stock')}}" required>
            </label>

            <br>

            <label>
                On promotion?
                <label for="1">Yes</label>
                <input type="radio" value="1" name="promotion">
                <label for="0">No</label>
                <input type="radio" value="0" name="promotion">
            </label>

            <br>

            <label>
                Metal Type:
                <label for="silver">Silver</label>
                <input type="radio" value="silver" name="metalType">
                <label for="gold">Gold</label>
                <input type="radio" value="gold" name="metalType">
            </label>

            <br>

            <label>Category:</label>
            <label>
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
            </label>

            <br>

            <label for="description">
                Product Description
                <br>
                <textarea required cols="30" rows="5" name="description">{{old('description')}}</textarea>
            </label>

            <br>

            <label for="mainImage">
                Upload Main Product Image
                <input type="file" id="mainImage" name="mainImage">
            </label>

            <br>

            <input class="button" type="submit" value="Create Product">
        </form>
    </div>
@endsection
