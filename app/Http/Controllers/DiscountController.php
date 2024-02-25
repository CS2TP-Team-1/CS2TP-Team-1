<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('pages.discounts', compact('discounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:discounts',
            'amount' => 'required|numeric',
        ]);

        Discount::create([
            'code' => $request->code,
            'amount' => $request->amount,
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount added successfully!');
    }
}
