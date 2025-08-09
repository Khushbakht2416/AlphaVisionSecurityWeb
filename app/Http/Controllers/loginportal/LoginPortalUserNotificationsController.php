<?php

namespace App\Http\Controllers\loginportal;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\NotificationsModel;
use Illuminate\Http\Request;

class LoginPortalUserNotificationsController extends Controller
{
    public function index()
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect('/customerportal/login')->with('error', 'Your account has been blocked. Please contact support.');
            }

            session(['customer' => $freshCustomer]);

            $notifications = NotificationsModel::where('customer_id', $freshCustomer->id)
            ->orderBy('created_at', 'desc')
            ->get();

            return view('loginportal.notifications', compact( 'notifications'));
        }

        return redirect('/customerportal/login')->with('error', 'Your session has expired. Please log in again.');
    }
}
