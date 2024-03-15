@extends('layouts.default')
@section('title', 'Products Dashboard')

@section('content')
    <h1>Products Dashboard</h1>
    <div class="form"><button class="button new-product-button" onclick="location.href='/admin/products/create'">Create a New Product</button></div>
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
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>£{{$product->price}}</td>
                <td><form method="post" action="{{route('admin.products-update-stock')}}">
                        @csrf
                        @method('PATCH')
                        <input name="id" hidden value="{{$product->id}}">
                        <input type="number" name="stock" min="0" required value="{{$product->stock}}" onchange="this.form.submit()">
                    </form></td>
                <td>
                    @if($product->promotion === 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{$product->description}}</td>
                <td class="table-button-section">
                    <button class="button table-button" onclick="location.href='/admin/products/edit/{{$product->id}}'">Edit</button>
                    <button class="button table-button" onclick="location.href='/admin/products/delete/{{$product->id}}'">Delete
                    </button>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
