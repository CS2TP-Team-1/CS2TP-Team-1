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
        $cartTotal = session()->get('total');
        if (isset($cart[$id])){
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

        if ($cart[$id]['quantity'] > 1){
            $cart[$id]['quantity']--;
            $cartTotal -= $cart[$id]['price'];
        } else {
            unset($cart[$id]);
            $cartTotal -= $cart[$id]['price'];
        }

        session()->put('cart', $cart);
        session()->put('total', $cartTotal);

        return redirect()->back()->with('success','basket-updated');
    }

    public function removeProduct ($id): RedirectResponse
    {
            $cart = session()->get('cart', []);
            $cartTotal = session()->get('total');

            for ($i = 0; $i < $cart[$id]['quantity']; $i++){
                $cartTotal -= $cart[$id]['price'];
                session()->put('total', $cartTotal);
            }

            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            return redirect()->back()->with('success','basket-updated');

    }
}
