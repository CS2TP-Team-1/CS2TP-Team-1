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
                    <td>{{$product->description}}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
