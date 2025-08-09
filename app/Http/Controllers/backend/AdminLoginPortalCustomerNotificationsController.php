<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\NotificationsModel;
use Carbon\Carbon;
use Date;
use Illuminate\Http\Request;
use Session;

class AdminLoginPortalCustomerNotificationsController extends Controller
{
    public function index()
    {
        if (Session::has('email')) {
            $customers = CustomerModel::all();
            $notifications = NotificationsModel::all();
            return view('backend.view-all-notifications', compact('customers', 'notifications'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function viewNotification($id)
    {
        if (Session::has('email')) {
            $customer = CustomerModel::find($id);
            if ($customer) {
                $notifications = NotificationsModel::where('customer_id', $id)->get();
                return view('backend.view-notifications', compact('customer', 'notifications'));
            } else {
                return redirect()->back()->with('error', 'No User found!');
            }
        } else {
            return redirect('/admin/login');
        }
    }

    public function sendNewNotificationView()
    {
        if (Session::has('email')) {
            $customers = CustomerModel::all();
            return view('backend.send-new-notification', compact('customers'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function sendNotificationView($id)
    {
        if (Session::has('email')) {
            $customer = CustomerModel::find($id);
            if ($customer) {
                return view('backend.send-notification', compact('customer'));
            } else {
                return redirect()->back()->with('error', 'No User found!');
            }
        } else {
            return redirect('/admin/login');
        }
    }

    public function sendNewNotification(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'notification_type' => 'required|in:hourly,incident',
            'message' => 'required|string|max:500',
            'notification_date' => 'required|date',
            // 'status' => 'required|in:unread,read',
        ]);

        try {
            NotificationsModel::create([
                'customer_id' => $request->customer_id,
                'notification_type' => $request->notification_type,
                'message' => $request->message,
                'notification_date' => Carbon::parse($request->notification_date),
                // 'status' => $request->status,
                'status' => "unread",
            ]);

            return redirect()->intended('/loginportal/view-all-notifications')->with('success', 'Notification sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Notification not sent! Please try again');
        }
    }

    public function sendNotification(Request $request, $id)
    {
        $customer = CustomerModel::find($id);
        if (!$customer) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $request->validate([
            'notification_type' => 'required|in:hourly,incident',
            'message' => 'required|string|max:1000',
            'notification_date' => 'required|date',
            // 'status' => 'required|in:read,unread',
        ]);

        NotificationsModel::create([
            'customer_id' => $id,
            'notification_type' => $request->notification_type,
            'message' => $request->message,
            'notification_date' => $request->notification_date,
            // 'status' => $request->status,
            'status' => 'unread',
        ]);

        return redirect()->intended('/loginportal/view-notifications/' . $id)->with('success', 'Notification sent successfully.');
    }


    public function editNotification($id)
    {
        if (Session::has('email')) {
            $notification = NotificationsModel::findOrFail($id);
            $customers = CustomerModel::all();

            return view('backend.edit-notification', compact('notification', 'customers'));

        } else {
            return redirect('/admin/login');
        }
    }

    public function updateNotification(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'notification_type' => 'required|in:hourly,incident',
            'message' => 'required|string|max:500',
            'notification_date' => 'required|date',
            // 'status' => 'required|in:unread,read',
        ]);

        try {
            $notification = NotificationsModel::findOrFail($id);

            $notification->update([
                'customer_id' => $request->customer_id,
                'notification_type' => $request->notification_type,
                'message' => $request->message,
                'notification_date' => Carbon::parse($request->notification_date),
                // 'status' => $request->status,
                'status' => 'unread',
            ]);

            return redirect()->back()->with('success', 'Notification updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update notification. Please try again.');
        }
    }

    public function deleteNotification($id)
    {
        try {
            $notification = NotificationsModel::findOrFail($id);
            $notification->delete();

            return redirect()->back()->with('success', 'Notification deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete the notification. Please try again.');
        }
    }

}
