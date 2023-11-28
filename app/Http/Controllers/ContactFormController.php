<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    public function store(Request $request) : RedirectResponse
    {

        $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string|email',
        'message' => 'required|string'
        ]);
        
        ContactForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect('contact')->with('status', 'Contact Form Data Has Been inserted');
    }

    public function create():View{
        return view('contact');
    }
}
