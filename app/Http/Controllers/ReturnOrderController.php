<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ReturnOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReturnOrderController extends Controller
{
    public function returnProduct($order_id, $product_id): RedirectResponse
    {
        // Basic variable set up
        $order = Order::find($order_id);
        $product = Product::find($product_id);
        $value = $product->price;

        // Create the return order
        $returnOrder = Auth::user()->returns()->create([
            'returnValue' => $value,
            'product_id' => $product_id,
            'order_id' => $order_id,
        ]);

        $returnOrder->order()->associate($order);
        $returnOrder->product()->associate($product);

       // Return stock to the stock
        $newStockLevel = $product->stock + 1;
        $product->update([
            'stock' => $newStockLevel,
        ]);

        // Remove the product from the order
        $productCount = -1;
        foreach ($order->products as $productLoop) {
            if ( $productLoop->id == $product_id){
                $productCount = $productCount + 1;
            }
        }
        $order->products()->detach($product);

        for ($i = 0; $i < $productCount; $i++){
            $order->products()->attach($product);
        }

        session()->put('count', $productCount);

        return redirect(url('/order/'.$order_id));
    }

    public function viewReturn($id): View
    {
        $return = ReturnOrder::findOrFail($id);
        if ($return->user_id === Auth::id()) {
            return \Illuminate\Support\Facades\View::make('pages.account.viewReturn', ['return' => ReturnOrder::where('id', '=', '$id')->first()]);
        } else {
            abort(403, "This return does not belong to you.");
        }
    }
}
