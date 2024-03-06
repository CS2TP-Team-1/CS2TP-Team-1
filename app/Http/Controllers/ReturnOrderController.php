<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ReturnOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
//    public function returnProduct(Request $request): RedirectResponse
//    {
//        $order = Order::findOrFail($request->order_id);
//        $product = Product::findOrFail($request->product_id);
//        $value = $product->price;
//
//        $returnOrder = ReturnOrder::create([
//            'returnValue' => $value,
//        ]);
//
//        $returnOrder->product()->associate($product);
//        $returnOrder->order()->associate($order);
//
//        $order->products()->detach($product);
//
//        return redirect('/order/'.$order->id);
//
//    }

    public function returnProduct($order_id, $product_id): RedirectResponse
    {
        // Basic variable set up
        $order = Order::find($order_id);
        $product = Product::find($product_id);
        $value = $product->price;

        // Create the return order
        $returnOrder = ReturnOrder::create([
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
        $productCount = 0; // Count of how many of that product there is in the order (we only want to remove 1)
        foreach($order->products as $productLoop) {
            if ($productLoop->id === $product_id) // Increment $productCount for the amount of that product in order
                $productCount++;
        }
        $order->products()->detach($product); // Removes all of the specified product from the order regardless of whether there is 1 or 7000
        $productCount--;
        for ($i = 0; $i < $productCount; $i++){
            $order->products()->attach($product);
        }



        return redirect(url('/order/'.$order_id));
    }
}
