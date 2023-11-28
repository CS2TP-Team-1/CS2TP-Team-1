<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $form = new ContactForm();
        $form->name = $request->name;
        $form->email = $request->email;
        $form->message =$request->message;
        $form->save();
        return redirect('contact')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function index():View{
        return view('contact');
    }
}
