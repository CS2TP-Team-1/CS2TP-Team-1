@extends('layouts.default')
@section('title', 'Checkout')

@section('content')
    <h1>Checkout Your Basket</h1>

    <h3>Your Basket Total: £{{session()->get('total')}}</h3>

    <form action="{{ route('checkout') }}" method="post">
        @csrf
        @method('PUT')
        <label>
            Name on Card
            <br>
            <input required type="text">
        </label>
        <br>
        <label>
            Card Number
            <br>
            <input required type="text" min="16" max="16">
        </label>
        <br>
        <label>
            CVV
            <br>
            <input required type="text" min="3" max="3">
        </label>
        <br>
        <label>
            Expiry Date
            <br>
            <i>Month / Year </i>
            <input required type="text">
            <input required type="text">
        </label>
        <br>
        <button type="submit">Checkout</button>
    </form>
@endsection
