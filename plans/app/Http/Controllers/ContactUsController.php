<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsController extends Controller
{
    public function show()
    {
        return view('User.contact');
    }
    public function about()
    {
        return view('User.about-us');
    }

     public function saveContact(Request $request)
{
    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message')
    ];

    Contact::create($data);
    return redirect()->route('/')->with('success', 'Your message has been sent.');
}
public function Details()
{
    $contacts = Contact::all();

    return view('dashbroad.contact', ['contacts' => $contacts]);
}

}
