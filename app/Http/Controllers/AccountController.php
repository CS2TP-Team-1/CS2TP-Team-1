<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function edit(Request $request): View
    {
        return Facades\View::make('pages.account.account')->with(['user' => $request->user()])->with(['orders' => Order::with('user')->orderBy('id')->get()]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        return Facades\Redirect::route('account.edit')->with('status', 'account-updated');

    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'password' => ['required', 'current_password:web'],
        ]);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Facades\Redirect::to('/');

    }


    public function viewOrder($id) {
        return Facades\View::make('pages.account.viewOrder', ['order' => Order::where('id', '=', $id)->first()]);
    }

}
