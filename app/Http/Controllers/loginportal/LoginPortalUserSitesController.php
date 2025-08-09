<?php

namespace App\Http\Controllers\loginportal;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\SitesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginPortalUserSitesController extends Controller
{
    public function index()
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::with('sites.timings')->find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect('/customerportal/login')->with('error', 'Your account has been blocked. Please contact support.');
            }

            session(['customer' => $freshCustomer]);

            $sites = $freshCustomer->sites;
            $now = Carbon::now('Australia/Sydney');
            $dayKey = strtolower($now->format('D'));

            $activeSites = $sites->filter(function ($site) use ($now, $dayKey) {
                if ($site->status != 1) {
                    return false;
                }

                $timing = $site->timings->firstWhere('day', $dayKey);
                if (!$timing) {
                    return false;
                }

                if ($timing->is_24_hours) {
                    return true;
                }

                try {
                    $parsedStart = Carbon::parse($timing->start_time, 'Australia/Sydney');
                    $parsedEnd = Carbon::parse($timing->end_time, 'Australia/Sydney');
                } catch (\Exception $e) {
                    return false;
                }

                $start = $parsedStart->setDate($now->year, $now->month, $now->day);
                $end = $parsedEnd->setDate($now->year, $now->month, $now->day);

                if ($end->lt($start)) {
                    return $now->gte($start) || $now->lte($end);
                }

                return $now->between($start, $end);
            });

            $totalSites = $sites->count();
            $activeCount = $activeSites->count();
            $inactiveCount = $totalSites - $activeCount;
            $activeSiteIds = $activeSites->pluck('id')->toArray();


            return view('loginportal.sites', compact('sites', 'totalSites', 'activeCount', 'inactiveCount', 'activeSiteIds'));
        }

        return redirect('/customerportal/login')->with('error', 'Your session has expired. Please log in again.');
    }


    // public function singleSite($token)
    // {
    //     if (session()->has('customer')) {
    //         $sessionCustomer = session('customer');
    //         $freshCustomer = CustomerModel::find($sessionCustomer->id);

    //         if (!$freshCustomer || $freshCustomer->is_active != 1) {
    //             session()->forget('customer');
    //             return redirect('/customerportal/login')->with('error', 'Your account has been blocked. Please contact support.');
    //         }

    //         session(['customer' => $freshCustomer]);

    //         $sites = SitesModel::where('customer_id', $freshCustomer->id)
    //             ->where('token', $token)
    //             ->get();

    //         if ($sites->isEmpty()) {
    //             return redirect('/customerportal/login')->with('error', 'No site found for this token.');
    //         }

    //         $site = $sites->first();

    //         $reportsHourlyCount = $site->reports()->where('report_type', 'hourly')->count();
    //         $reportsIncidentCount = $site->reports()->where('report_type', 'incident')->count();

    //         return view('loginportal.single-site', compact('site', 'reportsHourlyCount', 'reportsIncidentCount'));
    //     }

    //     return redirect('/customerportal/login')->with('error', 'Your session has expired. Please log in again.');
    // }


    public function singleSite($token)
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect('/customerportal/login')->with('error', 'Your account has been blocked. Please contact support.');
            }

            session(['customer' => $freshCustomer]);

            $site = SitesModel::with(['customer', 'emergencyContacts', 'timings'])
                ->where('customer_id', $freshCustomer->id)
                ->where('token', $token)
                ->first();

            if (!$site) {
                return redirect('/customerportal/login')->with('error', 'No site found for this token.');
            }

            $reportsHourlyCount = $site->reports()->where('report_type', 'hourly')->count();
            $reportsIncidentCount = $site->reports()->where('report_type', 'incident')->count();

            return view('loginportal.single-site', compact('site', 'reportsHourlyCount', 'reportsIncidentCount'));
        }

        return redirect('/customerportal/login')->with('error', 'Your session has expired. Please log in again.');
    }

}
