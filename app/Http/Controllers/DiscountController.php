<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        // Logic to fetch and display all discounts
        $discounts = Discount::all();
        return response()->json($discounts);
    }

    public function show($id)
    {
        // Logic to fetch and display a specific discount
        $discount = Discount::find($id);
        if (!$discount) {
            return response()->json(['message' => 'Discount not found'], 404);
        }
        return response()->json($discount);
    }

    public function addtestDiscount()
{
    $discount = new Discount();
    $discount->code = 'B84NT';
    $discount->amount = '10';
    $discount->save();

    return 'Discount added successfully';
}
}
