<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ReturnOrder;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class AdminController extends Controller
{
  public function addDashboard(){
        return view('pages.admin.Admin-dashboard');
    }

    // User Dashboard Features
    public function listUsers(){  // General /admin/users page
        $users = User::all(); // Fetch all registered users

        return View::make('pages.admin.users.users', compact('users'));
    }

    public function addUsers(Request $request){ // Admin create a user
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'bail'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['bail', 'required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'accountType' => '0'
        ]);


        return redirect ('pages.admin.users.users') -> with ('Success, User has been registered successfully');
    }

    public function addPage(){ // Page for admin to add a user through
        return view('pages.admin.users.addUser');
    }


    public function editUsers($id){ // Admin edit user page
        $user = User::findOrFail($id);

        return view('pages.admin.users.edit', compact('user'));
    }

    public function amendUsers($id, Request $request){ // Function to actually edit the user account
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

        return redirect ('pages.admin.users.users') -> with ('Success, User has been updated registered ');
    }

    public function deleteUser($id) // Admin delete user function
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('Success, User has been successfully deleted');
    }

    // Product Dashbaord
    public function productsDashboard(): \Illuminate\View\View // Main view page
    {

        $products = Product::query()
            ->orderBy('stock', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return View::make('pages.admin.products.products', compact('products'));
    }

    public function productsEditPage($id) // Main edit page
    {
        return View::make('pages.admin.products.edit', ['product' => Product::where('id', '=', $id)->first()]);

    }

    public function productsEdit(Request $request): RedirectResponse  // Admin edit product function
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


    public function productsUpdateStock(Request $request): RedirectResponse // Function for editing stock from main dashboard
    {
        $product = Product::where('id', '=', $request->id);

        $product->update([
            'stock' => $request->stock,
        ]);

        return redirect(route('admin.products-dashboard'));
    }

    public function productsDelete($id) : RedirectResponse // Delete a product
    {
        $product = Product::where('id', '=', $id);

        $product->delete();

        return redirect(route('admin.products-dashboard'));
    }

    public function productsCreateForm() // Page for creating a product
    {
        return View::make('pages.admin.products.new');
    }

    public function productsCreate(Request $request) : RedirectResponse // Function to create a product
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


        Product::create([
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

    public function viewOrders(){

        $orders = Order::all();

        return view('pages.admin.orders', compact('orders'));
    }

    public function updateorderStatus(Request $request, $id){
        $request->validate(['status' => 'required|in:Ordered,Processing,Shipped',]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'the status has been edited');
    }

    public function viewOrder($id) {

        $order = Order::findOrFail($id);

        return view('pages.admin.AviewOrder', compact('order'));
    }
  
  // Admin Returns Dashboard

    public function returnsDashboard() // Main returns dashboard view
    {
        $returns = ReturnOrder::all();

        return View::make('pages.admin.returns.returns', compact('returns'));
    }

    public function viewReturn($id)
    {
        $return = ReturnOrder::findOrFail($id);

        return View::make('pages.admin.returns.viewReturn', compact('return'));
    }

    public function approveReturn ($id): RedirectResponse
    {
        $return = ReturnOrder::findOrFail($id);
        $product = Product::findOrFail($return->product_id);

        $return->update([
            'status' => 'Approved'
        ]);

        $productStock = $product->stock + 1;
        $product->update([
            'stock' => $productStock
        ]);

        return redirect(route('admin.view-return', $id));
    }

    public function denyReturn ($id) : RedirectResponse
    {
        $return = ReturnOrder::findOrFail($id);
        $product = Product::findOrFail($return->product_id);
        $order = Order::findOrFail($return->order_id);

        $return->update([
            'status' => 'Denied'
        ]);

        $order->products()->attach($product);

        return redirect(route('admin.view-return', $id));

    }
}


