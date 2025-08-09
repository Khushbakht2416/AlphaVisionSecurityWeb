<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsEmail;
use App\Models\frontend\ContactModel;
use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }
    public function submitMessage(Request $request)
    {
        $request->validate(
            [
              'name' => 'required|string|max:255',
              'email' => 'required|email',
              'subject' => 'required|string|max:255',
              'message' => 'required|string|max:2000',
            ]
            );
        $contact = new ContactModel();
        $contact->name= $request->name;
        $contact->email= $request->email;
        $contact->subject= $request->subject;
        $contact->message= $request->message;
        $contact->save();

        try {
            Mail::to('info@alphavisionsecurity.com.au')->send(new ContactUsEmail($request->name, $request->email, $request->subject, $request->message));
        } catch (\Exception $e) {
            return redirect('/contact-us')->with('error', 'Email address is not valid or network error. Please try again later.');
        }

        return redirect('/contact-us')->with('success', 'Thanks for contacting. We\'ll get back to you ASAP');

    }
}
