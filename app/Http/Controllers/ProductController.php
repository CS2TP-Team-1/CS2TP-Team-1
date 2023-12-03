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
            'price' => 'required|numeric',
            'promotion' => 'required',
            'metalType' => 'required',
            'category' => 'required',
            'mainImage' => 'required|mimes:jpg,jpeg,png,svg'
        ]);

        $mainImage = $request->file("mainImage");
        $newImageName = time() . '-' . $request->name . '.' . $mainImage->extension();
        $destinationPath = "images/products";
        $mainImage->move($destinationPath,$newImageName);


        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'promotion' => $request->input('promotion'),
            'metalType' => $request->input('metalType'),
            'category' => $request->input('category'),
            'mainImage' => $newImageName
        ]);

        return redirect(route('products.index'));
    }
}
