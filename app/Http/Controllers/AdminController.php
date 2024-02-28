<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function listUsers(){
        $users = User::all(); // Fetch all registered users

        return View::make('pages.admin.users', compact('users'));
    }

    public function addUsers(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'bail'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['bail', 'required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'accountType' => '0'
        ]);


        return redirect ('pages.admin.users') -> with ('Success, User has been registered successfully');
    }

    public function addPage(){
        return view('pages.admin.addUser');
    }
    
    public function editUsers($id){
        $user = User::findOrFail($id);

        return view('pages.admin.edit', compact('user'));
    }

    public function amendUsers($id, Request $request){
        $user = User::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'bail'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:' . User::class],
            
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'accountType' => 'user'
        ]);


        

        return redirect ('pages.admin.users') -> with ('Success, User has been updated registered ');
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user-> delete();

        return redirect()->back()->with('Success, User has been successfully deleted');

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

    public function productsUpdateStock(Request $request): RedirectResponse
    {
        $product = Product::where('id', '=', $request->id);

        $product->update([
            'stock' => $request->stock,
        ]);

        return redirect(route('admin.products-dashboard'));
    }

    public function productsDelete($id) : RedirectResponse
    {
        $product = Product::where('id', '=', $id);

        $product->delete();

        return redirect(route('admin.products-dashboard'));
    }

    public function productsCreateForm()
    {
        return View::make('pages.admin.products.new');
    }

    public function productsCreate(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'promotion' => 'required',
            'metalType' => 'required',
            'stock' => 'required|numeric',
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
            'stock' => $request->input('stock'),
            'mainImage' => $newImageName,
            'description' => $request->input('description')
        ]);

        return redirect(route('admin.products-dashboard'));

    }
}

