<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Support\Facades;

class ProductController extends Controller
{
    /*
    public function index(): View
    {
        return Facades\View::make('pages.products.index', array('products' => Product::all()));
    }
*/

//modifed index function for search feature
public function index(Request $request)
{
    $search = $request->input('searchQuery');
    $category = $request->input('category');
    $metalType = $request->input('metalType');

    $products = Product::when($search, function ($query) use ($search) {
        $query->where('name', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');
    })->when($category, function ($query) use ($category) {
        $query->where('category', $category);
    })->when($metalType, function ($query) use ($metalType) {
        $query->where('metalType', $metalType);
    })->get();

    return view('products.index', compact('products', 'search'));
}



    public function show(string $id): View
    {
//        $product = Product::find($id);
        return Facades\View::make('pages.products.view',['product' => Product::where('id', '=', $id)->first()]);
    }

    public function create(): View
    {
        return Facades\View::make('pages.products.new');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'promotion' => 'required',
            'metalType' => 'required',
            'category' => 'required',
            'mainImage' => 'required|mimes:jpg,jpeg,png,svg',
            'description' => 'required|string'
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
            'mainImage' => $newImageName,
            'description' => $request->input('description')
        ]);

        return redirect(route('products.index'));
    }
}
