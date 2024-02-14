<h2>Your Orders</h2>

<div class="form">
<form class="account-form">
@if($orders->isEmpty())
    <h3>You have no previous orders.</h3>
@else
    <table>
        <thead>
        <th>Order ID</th>
        <th>Order Value</th>
        <th>Order Status</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($orders as $order)
            @if($order->user_id==(auth()->user()->id))
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->totalValue}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <button onclick="location.href='/order/{{$order->id}}'">View Order</button>
                    </td>
                </tr>

            @endif
        @endforeach
        </tbody>
    </table>
@endif
</form>
</div>