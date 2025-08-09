<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\QuoteModel;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return view('frontend.quote');
    }
    public function submitMessage(Request $request)
    {
        $request->validate(
            [
              'name' => 'required|string|max:255',
              'email' => 'required|email',
              'message' => 'required|string|max:2000',
            ]
            );
        $quote = new QuoteModel();
        $quote->name= $request->name;
        $quote->email= $request->email;
        $quote->message= $request->message;
        $quote->save();
        return redirect('/quote')->with('success', 'Thanks for contacting. We\'ll get back to you ASAP');

    }
}
