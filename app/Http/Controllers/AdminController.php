<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function listUsers()
    {
        $users = User::all(); // Fetch all registered users

        return View::make('pages.admin.users', compact('users'));
    }

    public function productsDashboard()
    {

        $products = Product::all();

        return View::make('pages.admin.products.products', compact('products'));
    }

    public function productsEditPage($id)
    {
        $product = Product::where('id', '=', $id);

        return View::make('pages.admin.products.edit', ['product' => Product::where('id', '=', $id)->first()]);

    }

    public function productsEdit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'promotion' => 'required',
            'description' => 'required|string'
        ]);

        $product = Product::where('id', '=', $request->id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'promotion' => $request->promotion
        ]);

        return redirect(route('admin.products-dashboard'));
    }

    public function productsDelete($id) : RedirectResponse
    {
        $product = Product::where('id', '=', $id);

        $product->delete();

        return redirect(route('admin.products-dashboard'));
    }
}
