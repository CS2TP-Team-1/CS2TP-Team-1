<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\View\View;

// ContactFormController only has 3 functions:
// - Store: Stores the submission in the database
// - Create: Displays the /contact page
// - List: The admin view page

class ContactFormController extends Controller
{
    public function store(Request $request): RedirectResponse
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

        return redirect('contact')->with('status', 'form-submitted');
    }

    public function create(): View
    {
        return \Illuminate\Support\Facades\View::make('pages.contact');
    }

    public function list(): View
    {
        return \Illuminate\Support\Facades\View::make('pages.admin.contact-submission', array('forms' => ContactForm::all()));
    }
}
