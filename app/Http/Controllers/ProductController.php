<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Support\Facades;

class ProductController extends Controller
{
    public function index(): View
    {
        return Facades\View::make('pages.products.index', array('products' => Product::all()));
    }

    public function show(string $id): View
    {
//        $product = Product::find($id);
        return Facades\View::make('pages.products.view',['product' => Product::where('id', '=', $id)->first()]);
    }


}
