@extends('layouts.default')
@section('title', 'Admin-Orders')

@section('content')
<section class="admin">
        <div class="table">
            <div class="table-body">
                <h4 class="table-title">
                    Users' Orders
                </h4>

                <table class="table-table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Total Value of Order: £</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->user->email}}</td>
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

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </section>





@endsection
