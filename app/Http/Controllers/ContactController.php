<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
     public function showContactForm()
    {
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name_contact' => 'required|string|max:255',
            'email_contact' => 'required|string|email|max:255',
            'phone_contact' => 'required|string|max:255',
            'address_contact' => 'required|string|max:255',
            'message_contact' => 'required|string|max:500',
        ]);

        $contact = new Contact();
        $contact->name_contact = $request->input('name_contact');
        $contact->email_contact = $request->input('email_contact');
        $contact->phone_contact = $request->input('phone_contact');
        $contact->address_contact = $request->input('address_contact');
        $contact->message_contact = $request->input('message_contact');
        $contact->save();

        Mail::to('your-email@example.com')->send(new ContactMail($contact));

        return redirect('/contact')->with('success', 'Thank you for your message. We will get back to you soon.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
