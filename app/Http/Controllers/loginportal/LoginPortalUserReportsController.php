<?php

namespace App\Http\Controllers\loginportal;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\ReportsModel;
use App\Models\frontend\SitesModel;
use Illuminate\Http\Request;

class LoginPortalUserReportsController extends Controller
{
    public function index(Request $request)
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect('/customerportal/login')->with('error', 'Your account has been blocked. Please contact support.');
            }
            session(['customer' => $freshCustomer]);

            $sites = SitesModel::where('customer_id', $freshCustomer->id)->get();

            if ($request->has('site') && $request->site != '') {
                $selectedSiteId = $request->site;

                if ($selectedSiteId == 'all') {
                    $reportsHourly = ReportsModel::where('report_type', 'hourly')->get();
                    $reportsIncident = ReportsModel::where('report_type', 'incident')->get();
                } else {
                    $selectedSite = $sites->where('token', $selectedSiteId)->first();

                    if ($selectedSite) {
                        $reportsHourly = $selectedSite->reports->where('report_type', 'hourly');
                        $reportsIncident = $selectedSite->reports->where('report_type', 'incident');
                    } else {
                        $reportsHourly = collect();
                        $reportsIncident = collect();
                    }
                }
            } else {
                $reportsHourly = $sites->flatMap(function ($site) {
                    return $site->reports->where('report_type', 'hourly');
                });

                $reportsIncident = $sites->flatMap(function ($site) {
                    return $site->reports->where('report_type', 'incident');
                });
            }
            return view('loginportal.reports', compact('sites', 'reportsHourly', 'reportsIncident'));
        }

        return redirect('/customerportal/login')->with('error', 'Your session has expired. Please log in again.');
    }

    public function singleReport($token)
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect('/customerportal/login')->with('error', 'Your account has been blocked. Please contact support.');
            }
            session(['customer' => $freshCustomer]);

            $sites = SitesModel::where('customer_id', $freshCustomer->id)->where('token', $token)->get();

            $reportsHourly = $sites->flatMap(function ($site) {
                return $site->reports->where('report_type', 'hourly');
            });

            $reportsIncident = $sites->flatMap(function ($site) {
                return $site->reports->where('report_type', 'incident');
            });

            $sitename = $sites[0]->name;

            return view('loginportal.single-report', compact( 'reportsHourly', 'reportsIncident', 'sitename'));
        }

        return redirect('/customerportal/login')->with('error', 'Your session has expired. Please log in again.');
    }



}
