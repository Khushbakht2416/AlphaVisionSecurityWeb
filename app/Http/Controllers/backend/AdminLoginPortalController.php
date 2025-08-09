<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminProfileModel;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\NotificationsModel;
use App\Models\frontend\ReportsModel;
use App\Models\frontend\SitesModel;
use Illuminate\Http\Request;

class AdminLoginPortalController extends Controller
{
    public function index(){
        if (session()->has('email')) {
            $customer = CustomerModel::all();
            $sites = SitesModel::all();
            $reports = ReportsModel::all();
            $notifications = NotificationsModel::all();
            return view('backend.index2', compact('customer', 'sites', 'reports', 'notifications'));
        } else {
            return redirect('/admin/login');
        }
    }
}
