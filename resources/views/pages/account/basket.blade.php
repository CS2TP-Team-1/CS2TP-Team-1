@extends('layouts.default')
@section('title', 'Basket')

@section('content')
    <h1>Your Basket</h1>

    <div class="form">
    <form class="account-form">
    @if(session('status') === 'basket-updated')
        <p>Your basket has been updated!</p>
    @elseif (session('status') === 'item-not-found')
        <p>Item was not found in the basket.</p>
    @endif

    @if(!session('cart'))
        <h3>There are no items in your basket.</h3>
    @else
        <table class="table">
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
                        <a href="/products/{{$id}}">{{$details['name']}} </a>
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
                        <a href="{{ route('decrease-product-quantity', $id) }}">-</a>
                        <p>{{$details['quantity']}}</p>
                        <a href="{{ route('add-to-basket', $id) }}">+</a>
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
                    </td>
                    <td>
                        <p><strong>Total:</strong> £{{session()->get('total')}}</p>
                    </td>
                    <td>
                        <button class="button" id="checkout" onclick="location.href='/checkout'">Checkout</button>
                    </td>

                </tr>
            </tfoot>
        </table>
    @endif

@endsection
</form>
</div>
