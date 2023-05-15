<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
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
         return redirect()->route('about');
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
          $list = Contact::orderBy('id', 'DESC')->get();
        return view('admin.about.form', compact('list'));
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

         Contact::find($id)->delete();
        toastr()->info('Thành công','Xóa liên hệ thành công');
        return redirect()->back();
    }
     public function about_choose(Request $request)
    {
        $data = $request->all();
        $contact = Contact::find($data['id']);
        $contact->status = $data['trangthai_val'];
        $contact->save();
    }
}
