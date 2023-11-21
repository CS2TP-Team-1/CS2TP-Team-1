<?php

namespace App\Http\Controllers;

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
}
