@php use App\Models\Product; @endphp
@extends('layouts.default')
@section('title', 'Your Basket')



@section('content')
    <h1>Your Basket</h1>

    <div class="form">
        <form class="account-form">

            @if (session('status') === 'basket-updated')
                <p>Your basket has been updated!</p>
            @elseif (session('status') === 'item-not-found')
                <p>Item was not found in the basket.</p>
            @endif

            @if (!session('cart'))
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
                    @foreach (session('cart') as $id => $details)
                        @php
                            $remainingStock = Product::findOrFail($id)->stock - $details['quantity'];
                        @endphp
                        <tr>
                            <td>
                                <a href="/products/{{ $id }}">{{ $details['name'] }} </a>
                            </td>
                            <td>
                                {{ $details['price'] }}
                            </td>
                            <td>
                                {{ $details['category'] }}
                            </td>
                            <td>
                                {{ $details['metalType'] }}
                            </td>
                            <td>
                                <a href="{{ route('decrease-product-quantity', $id) }}">-</a>
                                <p>{{ $details['quantity'] }}</p>
                                @if($remainingStock > 0)
                                    <a href="{{ route('add-to-basket', $id) }}">+</a>
                                @endif

                            </td>
                            <td>

                                <a class="delete-product" href="/remove-basket-product/{{ $id }}"><i
                                        class="">Delete</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>
                            <a href="{{ route('products.index') }}">Continue Shopping</a>
                        </td>
                        <td>
                            <p><strong>Total:</strong> £{{ session()->get('total') }}</p>
                        </td>
                        <td>
                            <a href="/checkout">
                                <button type="button" class="login">Checkout</button>
                            </a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            @endif
        </form>
    </div>

    <h1>Add Discount Code</h1>
    <div class="form">
        <form class="account-form" action="{{route('apply-discount')}}" method="post">
            @csrf
            @method('PATCH')
            {{-- <div class="review"> --}}
            <label for="code">Code :</label>
            <br>
            @if (session()->get('discountApplied'))
                <input type="text" name="code" required id="code" readonly value="Discount Already Applied">
            @else
                <input type="text" name="code" required id="code">
                <button class="button">Validate</button>
            @endif
            {{-- </div> --}}

            @if(session('success') === 'discount-applied')
                <p>Discount Applied</p>
            @elseif(session('failed') === 'code-invalid')
                <p>Invalid Code</p>
            @endif
        </form>


    </div>
@endsection
