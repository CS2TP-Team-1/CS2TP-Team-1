@extends('layouts.default')
@section('title', 'Admin-Orders')

@section('content')
<section class="admin">
        <div class="table">
            <div class="table-body">
                <h1 class="table-title">
                    Orders Dashboard
                </h1>

                <form action="{{ route('admin.orders.search') }}" method="GET" class="search-form">
                    <input type="text" id="searchQuery" name="searchQuery" placeholder="Search by Order details..." class="search-form-input">
                    <select id="status" name="status" class="search-form-input">
                        <option value="">Select Status</option>
                        <option value="Ordered">Ordered</option>
                        <option value="Processing">Processing</option>
                        <option value="Shipped">Shipped</option>
                    </select>
                    <input type="submit" value="Search" class="search-form-input-submit">
                </form><br>

                @if(isset($searchQuery) && $searchQuery != "" || isset($status) && $status != "")
                    <p>Search results for:</p>
                    @if($searchQuery != "")
                        <strong>Query: {{$searchQuery}}</strong><br>
                    @endif
                    @if($status != "")
                        <strong>Status: {{$status}}</strong>
                    @endif

                @endif

                @if($orders->isEmpty())
                    <h2>No orders found.</h2>
                @else

                    @foreach($orders as $order)

                    @endforeach
                @endif

                <table class="table-table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Total Value of Order: £</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>@if($order->user == null)
                                    User Deleted
                                @else
                                    {{$order->user->name}}
                                @endif
                                </td>
                            <td>@if($order->user == null)
                                    User Deleted
                                @else
                                    {{$order->user->email}}
                                @endif
                                </td>
                            <td>
                                <form id="dropStatus" action="{{route('admin.order.updateStatus', $order->id)}}" method="post">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Ordered" @if($order->status == 'Ordered') selected @endif>Ordered</option>
                                        <option value="Processing" @if($order->status == 'Processing') selected @endif>Processing</option>
                                        <option value="Shipped" @if($order->status == 'Shipped') selected @endif>Shipped</option>

                                    </select>
                                </form>
                            </td>
                            <td>{{$order->totalValue}}</td>
                            <td>
                                <a href="{{route('admin.AviewOrder', ['id' => $order->id])}}"><i>View Order</i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </section>





@endsection
