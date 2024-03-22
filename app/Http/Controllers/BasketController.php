<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades;
use Mockery\Exception;

// Basket Controller contains the functions related to the basket and orders.
// From adding the first item to the basket to checking out

class BasketController extends Controller
{
    public function index(): View
    {
        return Facades\View::make('pages.account.basket');
    }

    public function addProductToBasket($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $cartTotal = session()->get('total');


        if (isset($cart[$id])) {
//        Check if there is enough stock to add another to the basket
//        Get current stock level, minus the quantity in the basket and see if there is 1 spare
            $remainingStock = $product->stock - $cart[$id]['quantity'];
            if ($remainingStock < 1) {
                return redirect()->back()->with('failed', 'no-stock');
            }

            $cart[$id]['quantity']++;
            $cartTotal += $product->price;
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "category" => $product->category,
                "metalType" => $product->metalType
            ];
            $cartTotal += $product->price;
        }
        session()->put('cart', $cart);
        session()->put('total', $cartTotal);
        return redirect()->back()->with('success', 'product-added');
    }

    public function decreaseProductQuantity($id): RedirectResponse
    {
        $cart = session()->get('cart', []);
        $cartTotal = session()->get('total');

        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
            $cartTotal -= $cart[$id]['price'];
        } else {
            unset($cart[$id]);
            $cartTotal -= $cart[$id]['price'];
        }

        session()->put('cart', $cart);
        session()->put('total', $cartTotal);

        return redirect()->back()->with('success', 'basket-updated');
    }

    public function removeProduct($id): RedirectResponse
    {
        $cart = session()->get('cart', []);
        $cartTotal = session()->get('total');

        for ($i = 0; $i < $cart[$id]['quantity']; $i++) {
            $cartTotal -= $cart[$id]['price'];
            session()->put('total', $cartTotal);
        }

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'basket-updated');

    }

    public function checkout(Request $request): RedirectResponse
    {
        $request->user()->orders()->create([
            'status' => 'Ordered',
            'totalValue' => session()->get('total'),
        ]);

        $order = Order::latest()->first();
        $cart = session()->get('cart');

        foreach ($cart as $id => $details) {
            $product = Product::findOrFail($details['id']);
            $currentStock = $product->stock;

            for ($i = 0; $i < $details['quantity']; $i++) {
                $order->products()->attach($product);
                $currentStock--;
            }

            $product->update([
                'stock' => $currentStock,
            ]);
        }

        session()->forget('cart');
        session()->forget('total');

        return redirect('/account');
    }

}
