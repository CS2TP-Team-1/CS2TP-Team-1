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
                "id" => $id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "category" => $product->category,
                "metalType" => $product->metalType
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'product-added');
    }

    public function updateBasket (Request $request): RedirectResponse
    {

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
