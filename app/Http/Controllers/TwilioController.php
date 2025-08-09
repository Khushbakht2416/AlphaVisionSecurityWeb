<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwilioController extends Controller
{
    public function index(){
        return view('send-sms');
    }
    public function sendSms(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'body' => 'required|string',
        ]);

        $twilioService = app('App\Services\TwilioService');
        $response = $twilioService->sendSms($request->phone, $request->body);

        if ($response->sid) {
            return redirect('/loginportal/customers')->with('success', 'SMS sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to send SMS. Please try again.');
        }
    }
}
