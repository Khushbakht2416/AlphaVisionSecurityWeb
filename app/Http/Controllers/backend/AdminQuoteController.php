<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminQuoteModel;
use Illuminate\Http\Request;

class AdminQuoteController extends Controller
{
    public function index(){
        if (session()->has('email')) {
            $quote = AdminQuoteModel::all();
            return view('backend.pages-quote', compact('quote'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function destroy($id)
    {
        $quote = AdminQuoteModel::findOrFail($id);
        $quote->delete();

        return redirect()->back()->with('success', 'Quote deleted successfully');
    }
}
