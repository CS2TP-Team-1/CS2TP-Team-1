<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function update (Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'old_password' => ['required', 'current_password:web'],
            'new_password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return Redirect::route('account.edit')->with('status', 'password-updated');
    }
}
