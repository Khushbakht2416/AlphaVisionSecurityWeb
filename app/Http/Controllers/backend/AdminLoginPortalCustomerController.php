<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use Hash;
use Illuminate\Http\Request;

class AdminLoginPortalCustomerController extends Controller
{
    public function index()
    {
        if (session()->has('email')) {
            $customer = CustomerModel::all();
            return view('backend.customers', compact('customer'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function createCustomerView()
    {
        if (session()->has('email')) {
            return view('backend.create-customer');
        } else {
            return redirect('/admin/login');
        }
    }

    public function createCustomer(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:8',
            'phone_number' => ['required', 'regex:/^\+61[0-9]{9}$/', 'max:15'],
            'address' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
        ], [
            'phone_number.regex' => 'Please enter an Australian number in the format +61412345678.',
        ]);


        CustomerModel::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'raw_password' => $request->password,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'profile_image' => 'loginportal/assets/images/user2.png',
            'company_name' => $request->company_name,
            'is_active' => true,
        ]);

        return redirect('/loginportal/customers')->with('success', 'User added successfully!');
    }

    public function toggleCustomerStatus($id)
    {
        $customer = CustomerModel::findOrFail($id);
        $customer->is_active = !$customer->is_active;
        $customer->save();

        if ($customer->is_active == 0) {
            return redirect()->back()->with('success', 'User blocked successfully!')->with('blocked_user_id', $customer->id)
                ->with('blocked_user_name', $customer->full_name);
        }
        return redirect()->back()->with('success', 'User unblocked successfully!')->with('unblocked_user_id', $customer->id)
            ->with('unblocked_user_name', $customer->full_name);
    }

    public function destroy($id)
    {
        $customer = CustomerModel::find($id);
        if ($customer) {
            $customer->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
