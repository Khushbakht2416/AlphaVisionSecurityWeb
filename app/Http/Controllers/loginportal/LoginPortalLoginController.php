<?php

namespace App\Http\Controllers\loginportal;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\frontend\CustomerModel;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Session;
use Str;

class LoginPortalLoginController extends Controller
{
    public function index()
    {
        if (session()->has('customer')) {
            return redirect('/customerportal');
        } else {
            return view('loginportal.login');
        }
    }

    public function onLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = CustomerModel::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password. Please try again.')->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        if ($request->remember_me == 'on') {
            config(['session.lifetime' => 1440]);
        } else {
            config(['session.lifetime' => 30]);
        }
        Session::put('customer', $user);
        return redirect()->intended('/customerportal');
    }

    public function forgotPasswordView()
    {
        if (session()->has('customer')) {
            return redirect('/customerportal');
        } else {
            return view('loginportal.forgot-password');
        }
    }

    public function forgotPasswardMail(Request $request)
    {

        $request->validate(['email' => 'required|email']);

        $user = CustomerModel::where('email', $request->email)->first();

        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ResetPasswordMail($user));

            return redirect()->back()->with('success', 'The Reset Password Link Has been send to your Email.');

        } else {
            return redirect()->back()->with('error', 'The provided email do not match our records.');
        }
    }
    public function resetPasswordVerifiyToken($token)
    {
        $user = CustomerModel::where('remember_token', $token)->first();
        if ($user) {
            return view('loginportal.reset-password', ['token' => $token]);
        } else {
            return redirect()->intended('/customerportal/login')->with('error', 'Something Went Wrong please Retry Later');
        }
    }

    public function setForgotPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = CustomerModel::where('remember_token', $request->token)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid Link To Reset Link.');
        }

        $user->password = Hash::make($request->password);
        $user->remember_token = "";
        $user->save();

        return redirect()->intended('/customerportal/login')->with('success', 'Password has been reset successfully.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        $request->session()->regenerateToken();
        return redirect('/customerportal/login');
    }

}
