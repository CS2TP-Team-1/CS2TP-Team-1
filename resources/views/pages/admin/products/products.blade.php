@extends('layouts.default')
@section('title', 'Products Dashboard')

@section('content')
    <h1>Products Dashboard</h1>

    <form action="{{ route('admin.products.search') }}" method="GET" class="search-form">
        <input type="text" id="searchQuery" name="searchQuery" placeholder="Search for jewellery..."
            class="search-form-input">
        <select id="category" name="category" class="search-form-input">
            <option value="">Select Category</option>
            <option value="necklaces">Necklaces</option>
            <option value="earrings">Earrings</option>
            <option value="rings">Rings</option>
            <option value="bracelets">Bracelets</option>
            <option value="watches">Watches</option>
        </select>
        <select id="metalType" name="metalType" class="search-form-input">
            <option value="">Select Metal Type</option>
            <option value="gold">Gold</option>
            <option value="silver">Silver</option>
        </select>
        <input type="submit" value="Search" class="button" style="width: 100%">
    </form>
    @if (isset($search))
        <p>Search results for: <strong>{{ $search }}</strong></p>
    @endif

    @if ($products->isEmpty())
        <h2>There are no products. </h2>
    @else
        <div class="form">
            <button style="margin-top: 5px" class="button new-product-button"
                onclick="location.href='/admin/products/create'">Create a New Product
            </button>
        </div>
        <table class="table">
            <thead>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock Amount</th>
                <th>On promotion?</th>
                <th>Description</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>£{{ $product->price }}</td>
                        <td>
                            <form method="post" action="{{ route('admin.products-update-stock') }}">
                                @csrf
                                @method('PATCH')
                                <input name="id" hidden value="{{ $product->id }}">
                                <input type="number" name="stock" min="0" required value="{{ $product->stock }}"
                                    onchange="this.form.submit()">
                            </form>
                        </td>
                        <td>
                            @if ($product->promotion === 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>{{ $product->description }}</td>
                        <td class="table-button-section">
                            <button class="button table-button"
                                onclick="location.href='/admin/products/edit/{{ $product->id }}'">Edit
                            </button>
                            <button class="button table-button"
                                onclick="location.href='/admin/products/delete/{{ $product->id }}'">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
