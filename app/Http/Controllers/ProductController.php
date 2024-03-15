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
    
        if ($search!=""  && $category=="" && $metalType=="" ) {
            $query->where('name', 'like', "%$search%");
        } 
        elseif ($search==""  && $category!="" && $metalType=="") {
            $query->where('category', 'like', "%$category%");
        } elseif ($search==""  && $category=="" && $metalType!="") {
            $query->where('metalType', 'like', "%$metalType%");
        } elseif ($search!=""  && $category!="" && $metalType=="") {
            $query->where('name', 'like', "%$search%")
                  ->Where('category', 'like', "%$category%");
        } elseif ($search!=""  && $category=="" && $metalType!="") {
            $query->where('name', 'like', "%$search%")
                  ->Where('metalType', 'like', "%$metalType%");
        } elseif ($search!="" && $category!="" && $metalType!="") {
            $query->where('name', 'like', "%$search%")
                  ->Where('category', 'like', "%$category%")
                  ->Where('metalType', 'like', "%$metalType%");
        }
    
        $products = $query->get();
    
        return view('pages.products.index', compact('products', 'search'));
        
        
        
    
    
        return view('pages.products.index', compact('products', 'search'));
    }



    public function show(string $id): View
    {
        $product = Product::with('reviews')->where('id', '=', $id)->first();
        return view('pages.products.view', compact('product'));
    }


}
