<?php

namespace App\Http\Controllers\loginportal;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use Hash;
use Illuminate\Http\Request;
use Session;

class LoginPortalUserSettingController extends Controller
{
    public function index(Request $request)
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect()->intended('/customerportal/login')->with('error', 'Your account has been blocked. Please contact support.');
            }
            session('customer' , $freshCustomer);
            $activeTab = $request->query('active_tab');

            if ($activeTab) {
                session()->put('active_tab', $activeTab);
            } elseif (!session()->has('active_tab')) {
                session()->put('active_tab', 'details');
            }
            return view('loginportal.settings');
        }

        return redirect()->intended('/customerportal/login')->with('error', 'Your session has expired. Please log in again.');
    }



    public function updateSetting(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'address' => 'required|string|max:1000',
            'phone_number' => ['required', 'regex:/^\+61[0-9]{9}$/', 'max:15'],
            'company_name' => 'required|string|max:255',
        ],[
            'phone_number.regex' => 'Please enter an Australian number in the format +61412345678.',
        ]);
        $customer = Session::get('customer');

        $customerDatabase = CustomerModel::where('email', $customer->email)->first();

        if (!$customerDatabase) {
            return redirect()->back()->with('error', 'Your detail is missing in our record, please make a signup first.');
        }
        $customerDatabase->full_name = $request->input('full_name');
        $customerDatabase->city = $request->input('city');
        $customerDatabase->state = $request->input('state');
        $customerDatabase->zip_code = $request->input('zip_code');
        $customerDatabase->country = $request->input('country');
        $customerDatabase->address = $request->input('address');
        $customerDatabase->phone_number = $request->input('phone_number');
        $customerDatabase->company_name = $request->input('company_name');
        $customerDatabase->save();

        Session::put('customer', $customerDatabase);

        return redirect()->back()->with('success', 'Your details have been updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Session::get('customer');

        $customerDatabase = CustomerModel::where('email', $customer->email)->first();

        if (!$customerDatabase) {
            return redirect()->back()->with('error', 'Your detail is missing in our record, please make a signup first.');
        }

        if (!Hash::check($request->input('current_password'), $customerDatabase->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $customerDatabase->password = Hash::make($request->input('new_password'));
        $customerDatabase->raw_password = $request->input('new_password');

        $customerDatabase->save();

        Session::put('customer', $customerDatabase);

        return redirect()->back()->with('success', 'Your password has been updated successfully.');
    }
}
