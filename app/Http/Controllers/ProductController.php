<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index', array('products' => Product::all()));
    }

    public function show(string $id): View
    {
        $product = Product::find($id);
        return view('products.view',[
            'product' => $product
        ]);
    }

    public function create(): View
    {
        return view('products.new');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|float',
            'promotion' => 'required',
            'metalType' => 'required',
            'category' => 'required',
           // 'mainImage' => 'required|mimes:jpg,jpeg,png,svg'
        ]);

        //$newImageName = time() . '-' . $request->name . '.' . $request->mainImage->extension();
        //$request->mainImage->move(public_path('images/products'), $newImageName);

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'promotion' => $request->input('promotion'),
            'metalType' => $request->input('metaltype'),
            'category' => $request->input('category'),
           // 'mainImage' => $newImageName
        ]);

        return redirect(route('products.index'));
    }
}
