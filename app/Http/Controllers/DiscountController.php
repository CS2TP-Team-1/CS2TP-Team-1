<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades;

// The DiscountController sets up the admin features of the Discounts system as well as the system to apply discounts to the basket

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('pages.admin.discounts', compact('discounts'));
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

    public function destroy($id)
    {
        $review = Discount::where('id', '=', $id);
        $review->delete();
        return redirect(url('/discounts')->with('success', 'Review deleted successfully.'));
    }

    public function applyDiscount(Request $request): RedirectResponse
    {
        $code = $request->code;
        $discountModel = Discount::where('code', '=', $code)->first();
        if ($discountModel === null) {
            return redirect()->back()->with('failed', 'code-invalid');
        } else {
            $amount = $discountModel->amount;
            $total = session()->get('total');
            $newTotal = $total - $amount;
            session()->put('total', $newTotal);
            session()->put('discountApplied', true);
            return redirect()->back()->with('success', 'discount-applied');
        }
    }
}
