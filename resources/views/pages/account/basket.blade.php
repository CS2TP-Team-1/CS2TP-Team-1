@extends('layouts.default')
@section('title', 'Basket')

@section('content')
    <h1>Your Basket</h1>

    @if(session('status') === 'basket-updated')
        <p>Your basket has been updated!</p>
    @elseif (session('status') === 'item-not-found')
        <p>Item was not found in the basket.</p>
    @endif

    @if(!session('cart'))
        <h3>There are no items in your basket.</h3>
    @else
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Metal Type</th>
                <th>Quantity</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach(session('cart') as $id => $details)
                <tr>
                    <td>
                        {{$details['name']}}
                    </td>
                    <td>
                        {{$details['price']}}
                    </td>
                    <td>
                        {{$details['category']}}
                    </td>
                    <td>
                        {{$details['metalType']}}
                    </td>
                    <td>
                        <form method="POST" action="{{route('update.basket')}}">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="productID" hidden readonly value="{{$details['id']}}">
                            <input type="number" name="quantity" required min='1' value="{{$details['quantity']}}">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>

                        <a class="delete-product" href="/remove-basket-product/{{$id}}"><i class="">Delete</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <a href="{{route('products.index')}}">Continue Shopping</a>
                        <button id="checkout">Checkout</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    @endif

@endsection
