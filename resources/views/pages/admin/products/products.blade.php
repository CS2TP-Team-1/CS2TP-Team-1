@extends('layouts.default')
@section('title', 'Products Dashboard')

@section('content')
    <h1>Products Dashboard</h1>

    <table>
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
                    <td>{{$product->stock}}</td>
                    <td>
                        @if($product->promotion === 1)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td>{{$product->description}}</td>
                    <td>
                        <button class="button" onclick="location.href='/admin/products/edit/{{$product->id}}'">Edit</button>
                        <button class="button" onclick="location.href='/admin/products/delete/{{$product->id}}'">Delete</button>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
