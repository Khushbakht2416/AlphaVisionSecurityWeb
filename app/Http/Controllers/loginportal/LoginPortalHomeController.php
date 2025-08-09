<?php

namespace App\Http\Controllers\loginportal;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\ReportsModel;
use App\Models\frontend\SitesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginPortalHomeController extends Controller
{
    public function index()
    {
        if (session()->has('customer')) {
            $sessionCustomer = session('customer');
            $freshCustomer = CustomerModel::with([
                'sites.reports',
                'sites.timings',
            ])->find($sessionCustomer->id);

            if (!$freshCustomer || $freshCustomer->is_active != 1) {
                session()->forget('customer');
                return redirect('/customerportal/login')->with('error', 'Your account has been blocked.');
            }

            session(['customer' => $freshCustomer]);

            $sites = $freshCustomer->sites;
            $totalSites = $sites->count();

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
            })->count();

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

            return view('loginportal.index', [
                'totalSites' => $totalSites,
                'activeSites' => $activeSites,
                'hourlyReportsCount' => $hourlyReports->count(),
                'incidentReportsCount' => $incidentReports->count(),
                'totalReportsCount' => $reports->count(),
                'newHourlyLast24h' => $newHourlyLast24h,
                'newIncidentLast7d' => $newIncidentLast7d,
                'newReportsLast7d' => $newReportsLast7d,
                'sitesLastUpdatedTime' => $sitesLastUpdatedTime,
                'totalReportLastUpdatedTime' => $totalReportLastUpdatedTime,
                'hourlyReportLastUpdatedTime' => $hourlyReportLastUpdatedTime,
                'incidentReportLastUpdatedTime' => $incidentReportLastUpdatedTime,
            ]);
        }

        return redirect('/customerportal/login')->with('error', 'Your session has expired.');
    }
}
