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
public function index(Request $request): View
    {
        
        
        
        
        $search = $request->input('searchQuery');
        $category = $request->input('category');
        $metalType = $request->input('metalType');
    
        $query = Product::query();
    
        if ($search!="") {
            $query->where('name', 'like', "%$search%");
        } 
        elseif ($category!="") {
            $query->where('category', 'like', "%$category%");
        } elseif ($metalType!="") {
            $query->where('metalType', 'like', "%$metalType%");
        } elseif ($search!="" && $category!="") {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('category', 'like', "%$category%");
        } elseif ($search!="" && $metalType!="") {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('metalType', 'like', "%$metalType%");
        } elseif ($search!="" && $category!="" && $metalType!="") {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('category', 'like', "%$category%")
                  ->orWhere('metalType', 'like', "%$metalType%");
        }
    
        $products = $query->get();
    
        return view('pages.products.index', compact('products', 'search'));
        
        
        
    
    
        return view('pages.products.index', compact('products', 'search'));
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
