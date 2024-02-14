<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function listUsers()
    {
        $users = User::all(); // Fetch all registered users

        return View::make('pages.admin.users', compact('users'));
    }
}
