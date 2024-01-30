<h2>Your Orders</h2>

@if($orders->isEmpty())
    <h3>You have no previous orders.</h3>
@else
<table>
    <thead>
        <th>Order ID</th>
        <th>Order Value</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($orders as $order)
            @if($order->user_id==(auth()->user()->id))
                <td>{{$order->id}}</td>
                <td>{{$order->totalValue}}</td>
                <td><button>View Order</button></td>
            @endif
        @endforeach
    </tbody>
</table>
@endif
