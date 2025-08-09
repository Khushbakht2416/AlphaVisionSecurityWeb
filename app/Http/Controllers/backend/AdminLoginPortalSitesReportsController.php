<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\ReportsModel;
use App\Models\frontend\SitesModel;
use Illuminate\Http\Request;
use Session;
use Str;

class AdminLoginPortalSitesReportsController extends Controller
{

    public function generateRandom()
    {
        $randomString = implode('-', [
            Str::random(4),
            Str::random(4),
            Str::random(4),
            Str::random(4),
        ]);

        return $randomString;
    }
    public function index()
    {
        if (Session::has('email')) {
            $reports = ReportsModel::all();
            $sites = SitesModel::all();
            $customers = CustomerModel::all();
            return view('backend.view-all-reports', compact('reports', 'sites', 'customers'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function viewReportView($id)
    {
        if (Session::has('email')) {
            $site = SitesModel::find($id);
            if (!$site) {
                return redirect()->back()->with('error', 'Site not found!');
            }
            $reports = ReportsModel::where('site_id', $site->id)->get();


            return view('backend.view-site-reports', compact('site', 'reports'));
        } else {
            return redirect('/admin/login');
        }
    }


    public function createNewReportView()
    {
        if (Session::has('email')) {
            $sites = SitesModel::all();
            return view('backend.add-new-report', compact('sites'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function createReportView($id)
    {
        if (Session::has('email')) {
            $site = SitesModel::find($id);
            if ($site) {
                return view('backend.add-report', compact('site'));
            } else {
                return redirect()->back()->with('error', 'Site Not Found!');
            }
        } else {
            return redirect('/admin/login');
        }
    }

    public function editReportView($id)
    {
        if (Session::has('email')) {
            $report = ReportsModel::find($id);
            if ($report) {
                $site = SitesModel::find($report->site_id);
                if ($site) {
                    return view('backend.edit-site-report', compact('site', 'report'));
                } else {
                    return redirect()->back()->with('error', 'Site Not Found!');
                }
            } else {
                return redirect()->back()->with('error', 'Report Not Found!');
            }
        } else {
            return redirect('/admin/login');
        }
    }


    public function createNewReport(Request $request)
    {

        $validated = $request->validate([
            'site_id' => 'required|exists:sites,id',
            'report_date' => 'required|date',
            'report_type' => 'required|in:hourly,incident',
            'description' => 'required|string',
            'report_images' => 'nullable|array',
        ]);



        $report = new ReportsModel();
        $report->site_id = $validated['site_id'];
        $report->report_date = $validated['report_date'];
        $report->report_type = $validated['report_type'];
        $report->description = $validated['description'];
        $report->status = 'pending';
        $report->token = $this->generateRandom();
        $report->save();

        if ($request->hasFile('report_images')) {
            $imagePaths = [];

            foreach ($request->file('report_images') as $file) {
                $imageName = 'report_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $folderPath = 'loginportal/assets/images/report_images';
                $file->move(public_path($folderPath), $imageName);
                $imagePaths[] = "$folderPath/$imageName";
            }

            $report->report_images = json_encode($imagePaths);
            $report->save();
        }


        return redirect('/loginportal/view-all-reports')->with('success', 'Report added successfully!');
    }


    public function deleteNewReport($id)
    {
        if (Session::has('email')) {
            $report = ReportsModel::find($id);
            if ($report) {
                $report->delete();
                return redirect()->back()->with('success', 'Report deleted successfully!');
            }
            return redirect()->back()->with('error', 'Report not found!');
        } else {
            return redirect('/admin/login');
        }
    }

    public function storeSiteReport(Request $request, $id)
    {
        $validated = $request->validate([
            'report_date' => 'required|date',
            'report_type' => 'required|in:hourly,incident',
            'description' => 'required|string',
            // 'status' => 'required|string|in:pending,completed,approved',
            'report_images' => 'nullable|array',
            'report_images.*' => 'image|max:2048',
        ]);

        $site = SitesModel::find($id);

        if (!$site) {
            return redirect()->back()->with('error', 'Site not found.');
        }

        $report = new ReportsModel();
        $report->site_id = $site->id;
        $report->report_date = $validated['report_date'];
        $report->report_type = $validated['report_type'];
        $report->description = $validated['description'];
        $report->status = 'pending';
        // $report->status = $validated['status'];
        $report->token = $this->generateRandom();

        $report->save();

        if ($request->hasFile('report_images')) {
            $imagePaths = [];
            foreach ($request->file('report_images') as $file) {
                $imageName = 'report_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $folderPath = 'loginportal/assets/images/report_images';
                $file->move(public_path($folderPath), $imageName);

                $imagePaths[] = $folderPath . '/' . $imageName;

            }
            $report->report_images = json_encode($imagePaths);
            $report->save();
        }

        return redirect()->intended('/loginportal/view-reports/' . $site->id)->with('success', 'Report added successfully!');
    }

    public function updateSiteReport(Request $request, $id)
    {
        $report = ReportsModel::find($id);

        if (!$report) {
            return redirect()->back()->with('error', 'Report not found.');
        }

        $initialImages = json_decode($report->report_images, true) ?? [];

        $request->validate([
            'report_date' => 'required|date',
            'report_type' => 'required|in:hourly,incident',
            'description' => 'nullable|string',
            'report_images' => 'nullable|array',
        ]);


        $report->report_date = $request->input('report_date');
        $report->report_type = $request->input('report_type');
        $report->description = $request->input('description');
        $report->status = 'pending';
        $currentImages = json_decode($request->input('current_images'), true);
        $currentImages = is_array($currentImages) ? $currentImages : [];

        $newImages = [];

        if ($request->hasFile('report_images')) {
            foreach ($request->file('report_images') as $file) {
                $name = 'report_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $folder = 'loginportal/assets/images/report_images';
                $file->move(public_path($folder), $name);
                $newImages[] = "$folder/$name";
            }
        }
        $allImages = array_merge($currentImages, $newImages);
        $removedImages = array_diff($initialImages, $currentImages);
        foreach ($removedImages as $path) {
            $fullPath = public_path($path);
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
        }
        $report->report_images = empty($allImages) ? null : json_encode($allImages);

        $report->save();

        return redirect('/loginportal/view-reports/' . $report->site_id)
            ->with('success', 'Report updated successfully.');
    }

}
