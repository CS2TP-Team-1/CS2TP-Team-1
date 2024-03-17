@extends('layouts.default')
@section('title', 'Discounts')

@section('content')
    <h1>Discounts</h1>
    <div class="form">
        <form class="account-form">
            @forelse ($discounts as $discount)
                <div class="review">
                    <p>Code: {{ $discount->code }} Value: £{{ $discount->amount }}</p>
                </div>
                <button class="button" onclick="location.href='/discounts/delete/{{$discount->id}}'">Delete</button>
            @empty
                <h2>No Discounts to show!</h2>
            @endforelse
        </form>
    </div>

    {{-- @auth --}}

    <div class="form" style="padding-top: 10px">
        <form class="account-form" method="POST" action="{{ route('discounts.store') }}">
            @csrf
            <div>
                <label for="code">Code:</label>
                <input type="text" id="code" name="code">
            </div>
            <div>
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount">
            </div>
            <button class="button" type="submit">Add Discount</button>
        </form>
    </div>

    {{-- @endauth --}}
@endsection
