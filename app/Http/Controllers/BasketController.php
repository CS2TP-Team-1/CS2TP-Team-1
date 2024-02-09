<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades;
use Mockery\Exception;

class BasketController extends Controller
{
    public function index() : View
    {
        return Facades\View::make('pages.account.basket');
    }

    public function addProductToBasket($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                'quantity' => 1,
                "price" => $product->price,
                "category" => $product->category,
                "metalType" => $product->metalType
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to the basket.');
    }

    public function updateBasket (Request $request): RedirectResponse
    {
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1'],
            'id' => ['required', 'numeric']
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        } else {
            return redirect('/basket')->with('failed', 'item-not-found');
        }

        return redirect('/basket')->with('success','basket-updated');
    }

    public function removeProduct ($id): RedirectResponse
    {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            return redirect()->back()->with('success','basket-updated');

    }
}
