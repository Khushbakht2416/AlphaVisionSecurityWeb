<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminProfileModel;
use App\Models\backend\AdminContactModal;
use App\Models\backend\AdminQuoteModel;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        if (session()->has('email')) {

            $admin = AdminProfileModel::where('id', 1)->first();

            session()->put('job', $admin->job);
            session()->put('image', $admin->profile_image);
            session()->put('username', $admin->name);

            $contact = AdminContactModal::all();
            $quote = AdminQuoteModel::all();
            return view('backend.index', compact('contact', 'quote'));
        } else {
            return redirect('/admin/login');
        }

    }
}
