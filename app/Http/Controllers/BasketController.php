<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades;

class BasketController extends Controller
{
    public function index() : View
    {
        return Facades\View::make('pages.account.basket');
    }
}
