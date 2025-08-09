<?php

namespace App\Http\Controllers\loginportal;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\ReportsModel;
use App\Models\frontend\SitesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class LoginPortalUserProfileController extends Controller
{
    public function index()
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::with(['sites.reports'])->find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect('/customerportal/login')->with('error', 'Your account has been blocked.');
            }

            session(['customer' => $freshCustomer]);

            $sites = $freshCustomer->sites;
            $totalSites = $sites->count();
            $activeSites = $sites->where('status', 1)->count();

            $reports = $sites->flatMap->reports;
            $hourlyReports = $reports->where('report_type', 'hourly');
            $incidentReports = $reports->where('report_type', 'incident');

            $now = Carbon::now();
            $last24Hours = $now->copy()->subHours(24);
            $last7Days = $now->copy()->subDays(7);

            $newHourlyLast24h = $hourlyReports->where('created_at', '>=', $last24Hours)->count();
            $newIncidentLast7d = $incidentReports->where('created_at', '>=', $last7Days)->count();
            $newReportsLast7d = $reports->where('created_at', '>=', $last7Days)->count();

            $sitesLastUpdatedTime = SitesModel::orderBy('updated_at', 'desc')->first();
            $totalReportLastUpdatedTime = ReportsModel::orderBy('updated_at', 'desc')->first();
            $hourlyReportLastUpdatedTime = ReportsModel::where('report_type', 'hourly')->orderBy('updated_at', 'desc')->first();
            $incidentReportLastUpdatedTime = ReportsModel::where('report_type', 'incident')->orderBy('updated_at', 'desc')->first();

            $totalReportsCount = $reports->count();

            return view('loginportal.profile', [
                'totalSites' => $totalSites,
                'activeSites' => $activeSites,
                'hourlyReportsCount' => $hourlyReports->count(),
                'incidentReportsCount' => $incidentReports->count(),
                'totalReportsCount' => $totalReportsCount,
                'newHourlyLast24h' => $newHourlyLast24h,
                'newIncidentLast7d' => $newIncidentLast7d,
                'newReportsLast7d' => $newReportsLast7d,
                'sitesLastUpdatedTime' => $sitesLastUpdatedTime,
                'totalReportLastUpdatedTime' => $totalReportLastUpdatedTime,
                'hourlyReportLastUpdatedTime' => $hourlyReportLastUpdatedTime,
                'incidentReportLastUpdatedTime' => $incidentReportLastUpdatedTime,
            ]);
        }

        return redirect('/customerportal/login')->with('error', 'The current session is invalid. Please login again.');
    }




    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|max:2048',
        ]);

        $customer = Session::get('customer');

        if (!$customer) {
            return redirect()->back()->with('error', 'The current session is invalid. Please login again.');
        }

        $customerDatabase = CustomerModel::where('email', $customer->email)->first();

        if (!$customerDatabase) {
            return redirect()->back()->with('error', 'We cannot find your data in our records. Please login again.');
        }

        if ($customerDatabase->profile_image && file_exists(public_path($customerDatabase->profile_image))) {
            unlink(public_path($customerDatabase->profile_image));
        }
        $file = $request->file('profile_image');
        $imageName = 'profile_upload_' . str_replace(' ', '_', $customer->full_name) . '.' . $file->getClientOriginalExtension();
        $folderPath = 'loginportal/assets/images/uploads';
        $file->move(public_path($folderPath), $imageName);
        $imagePath = $folderPath . '/' . $imageName;
        $customerDatabase->profile_image = $imagePath;
        $customerDatabase->save();
        Session::put('customer', $customerDatabase);

        return back()->with('success', 'Profile image updated!');
    }


}
