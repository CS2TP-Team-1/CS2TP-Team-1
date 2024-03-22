@php use Illuminate\Support\Facades\File; @endphp
@extends('layouts.default')
@section('title', 'View Order #' . $order->id)



@section('content')

    <h1> Order #{{$order->id}}</h1>
    <h2> Order Status:
        <form id="dropStatus" action="{{route('admin.order.updateStatus', $order->id)}}" method="post">
            @csrf
            <select name="status" onchange="this.form.submit()">
                <option value="Ordered" @if($order->status == 'Ordered') selected @endif>Ordered</option>
                <option value="Processing" @if($order->status == 'Processing') selected @endif>Processing</option>
                <option value="Shipped" @if($order->status == 'Shipped') selected @endif>Shipped</option>
            </select>
        </form>
    </h2>
    <h3> Total Value of Order: £{{$order->totalValue}}</h3>
    <br>
    <h2>Your Order Contents:</h2>
    <div class="form">
        <form class="account-form">
            <table class="table">
                <thead>
                <th>Product Image</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                </thead>
                @foreach($order->products as $product)
                    @php
                        $imgPath = '/images/products/' .$product->mainImage;
                        if (!File::exists($imgPath)) {
                            $imgPath = "/images/image_unavailable.png";
                        }
                    @endphp
                    <tr>
                        <td><img src="{{ $imgPath }}" alt="Image of the Product" width="100px" id="product-view-image">
                        </td>
                        <td>{{$product->id}}</td>
                        <td><a target="_blank" href="/products/{{$product->id}}">{{$product->name}} </a></td>
                        <td>£{{$product->price}}</td>
                    </tr>
                @endforeach

            </table>

        </form>
    </div>
@endsection
