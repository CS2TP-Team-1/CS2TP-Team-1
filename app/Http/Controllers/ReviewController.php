<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
 public function store(Request $request)
{
    $request->validate([
        'rating' => 'required|integer|between:1,5',
    ]);
}
}
