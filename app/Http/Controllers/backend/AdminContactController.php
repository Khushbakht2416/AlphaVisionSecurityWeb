<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminContactModal;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(){
        if (session()->has('email')) {
            $contacts = AdminContactModal::all();
            return view('backend.pages-contact', compact('contacts'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function destroy($id)
    {
        $contact = AdminContactModal::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully');
    }
}
