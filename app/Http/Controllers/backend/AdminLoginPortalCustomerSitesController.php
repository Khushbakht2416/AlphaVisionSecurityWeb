<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\CustomerModel;
use App\Models\frontend\EmergencyContact;
use App\Models\frontend\SitesModel;
use App\Models\frontend\SiteTiming;
use DB;
use Illuminate\Http\Request;
use Log;
use Session;
use Str;

class AdminLoginPortalCustomerSitesController extends Controller
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
    public function addSiteView($id)
    {
        if (Session::has('email')) {
            $customer = CustomerModel::find($id);
            return view('backend.add-customer-site', compact('customer'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function viewSite($id)
    {
        if (Session::has('email')) {
            $customer = CustomerModel::find($id);

            if (!$customer) {
                return redirect()->back()->with('error', 'User not found');
            }

            $sites = SitesModel::where('customer_id', $id)->get();

            return view('backend.customer-sites', compact('customer', 'sites'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function viewSingleSite($id)
    {
        if (Session::has('email')) {
            $site = SitesModel::with(['customer', 'emergencyContacts', 'timings'])
                ->where('id', $id)
                ->firstOrFail();

            if (!$site) {
                return redirect()->back()->with('error', 'Site not found');
            }

            return view('backend.view-single-site', compact('site'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function addSite(Request $request, $customerId)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'required|string',
            'emergency_protocol' => 'required|string',
            'no_of_cameras' => 'required|integer',
            'camera_software' => 'required|string',
            'software_credentials' => 'required|string',

            'contacts' => 'required|array|min:1',
            'contacts.*.name' => 'required|string',
            'contacts.*.phone' => 'required|string',
            'contacts.*.designation' => 'nullable|string',
            'contacts.*.email' => 'nullable|email',
            'contacts.*.emergency_phone' => 'nullable|string',
            'contacts.*.address' => 'nullable|string',
        ]);

        $rawTimings = $request->timings;

        if (!is_array($rawTimings) || count($rawTimings) < 1) {
            return redirect()->back()->with('error', 'At least one timing is required.');
        }

        $timings = [];
        foreach ($rawTimings as $day => $timing) {
            if (!in_array($day, ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'])) {
                continue;
            }

            $is24 = isset($timing['is_24_hours']) && $timing['is_24_hours'] == "1";

            if (!$is24 && (!isset($timing['start_time']) || !isset($timing['end_time']))) {
                return redirect()->back()->with('error', "Start and End time required for $day if not 24 hours.");
            }

            if (isset($timing['selected']) && $timing['selected'] == "1") {
                $timings[] = [
                    'day' => $day,
                    'is_24_hours' => $is24,
                    'start_time' => $is24 ? null : $timing['start_time'],
                    'end_time' => $is24 ? null : $timing['end_time'],
                ];
            }
        }

        if (count($timings) < 1) {
            return redirect()->back()->with('error', 'You must provide at least one valid timing.');
        }

        DB::beginTransaction();
        try {
            $site = SitesModel::create([
                'customer_id' => $request->customer_id,
                'name' => $request->name,
                'type' => $request->type,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'emergency_protocol' => $request->emergency_protocol,
                'no_of_cameras' => $request->no_of_cameras,
                'camera_software' => $request->camera_software,
                'software_credentials' => $request->software_credentials,
                'token' => $this->generateRandom(),
                'status' => 1,
            ]);

            $contacts = array_map(function ($c) use ($site) {
                return [
                    'site_id' => $site->id,
                    'name' => $c['name'],
                    'phone' => $c['phone'],
                    'designation' => $c['designation'] ?? null,
                    'email' => $c['email'] ?? null,
                    'emergency_phone' => $c['emergency_phone'] ?? null,
                    'address' => $c['address'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $request->contacts);
            EmergencyContact::insert($contacts);

            foreach ($timings as &$t) {
                $t['site_id'] = $site->id;
                $t['created_at'] = now();
                $t['updated_at'] = now();
            }
            SiteTiming::insert($timings);

            DB::commit();
            return redirect('/loginportal/view-sites/' . $customerId)->with('success', 'Site created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function deleteSite($id)
    {
        $site = SitesModel::find($id);
        if ($site) {
            $site->delete();
            return redirect()->back()->with('success', 'The site was deleted successfully');
        } else {
            return redirect()->back()->with('error', 'This site cannot be found in our records');
        }
    }
    public function edit($id)
    {
        $site = SitesModel::with(['customer', 'emergencyContacts', 'timings'])
            ->where('id', $id)
            ->firstOrFail();

        if ($site) {

            return view('backend.edit-customer-site', compact('site'));

        }

        return redirect()->back()->with('error', 'This site is not found in our records');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'camera_software' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'emergency_protocol' => 'nullable|string',
            'no_of_cameras' => 'nullable|integer|min:0',
            'software_credentials' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'contacts' => 'nullable|array',
            'contacts.*.name' => 'required|string|max:255',
            'contacts.*.phone' => 'required|string|max:20',
            'contacts.*.designation' => 'nullable|string|max:255',
            'contacts.*.email' => 'nullable|email|max:255',
            'contacts.*.emergency_phone' => 'nullable|string|max:20',
            'contacts.*.address' => 'nullable|string',
        ]);

        $timings = collect($request->timings)->filter(fn($t) => isset($t['selected']))->map(function ($timing, $day) {
            $is24 = isset($timing['is_24_hours']) && $timing['is_24_hours'] == "1";
            if (!$is24 && (!isset($timing['start_time']) || !isset($timing['end_time']))) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'timings' => "Start and End time required for $day if not 24 hours."
                ]);
            }
            return [
                'day' => $day,
                'is_24_hours' => $is24,
                'start_time' => $is24 ? null : $timing['start_time'],
                'end_time' => $is24 ? null : $timing['end_time'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->values()->all();

        $site = SitesModel::findOrFail($id);

        DB::beginTransaction();
        try {
            $site->update($request->only([
                'name',
                'type',
                'address',
                'latitude',
                'longitude',
                'description',
                'emergency_protocol',
                'no_of_cameras',
                'camera_software',
                'software_credentials',
            ]));

            if (!empty($request->contacts)) {
                $contacts = array_map(function ($c) use ($site) {
                    return [
                        'site_id' => $site->id,
                        'name' => $c['name'],
                        'phone' => $c['phone'],
                        'designation' => $c['designation'] ?? null,
                        'email' => $c['email'] ?? null,
                        'emergency_phone' => $c['emergency_phone'] ?? null,
                        'address' => $c['address'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $request->contacts);

                EmergencyContact::where('site_id', $site->id)->delete();
                EmergencyContact::insert($contacts);
            }
            SiteTiming::where('site_id', $site->id)->delete();
            foreach ($timings as &$t) {
                $t['site_id'] = $site->id;
            }
            SiteTiming::insert($timings);

            DB::commit();
            return redirect()->back()->with('success', 'Site updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Site update failed', ['exception' => $e]);
            return redirect()->back()->with('error', 'Something went wrong while updating the site.');
        }
    }
    public function viewAllSite()
    {
        if (Session::has('email')) {
            $sites = SitesModel::with('customer')->get();
            $customers = CustomerModel::all();
            return view('backend.view-all-sites', compact('sites', 'customers'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function createNewSiteView()
    {
        if (Session::has('email')) {
            $customers = CustomerModel::all();
            return view('backend.add-new-customer-site', compact('customers'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function createNewSite(Request $request)
    {

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'required|string',
            'emergency_protocol' => 'required|string',
            'no_of_cameras' => 'required|integer',
            'camera_software' => 'required|string',
            'software_credentials' => 'required|string',

            'contacts' => 'required|array|min:1',
            'contacts.*.name' => 'required|string',
            'contacts.*.phone' => 'required|string',
            'contacts.*.designation' => 'nullable|string',
            'contacts.*.email' => 'nullable|email',
            'contacts.*.emergency_phone' => 'nullable|string',
            'contacts.*.address' => 'nullable|string',
        ]);


        $rawTimings = $request->timings;

        if (!is_array($rawTimings) || count($rawTimings) < 1) {
            return redirect()->back()->with('error', 'At least one timing is required.');
        }

        $timings = [];
        foreach ($rawTimings as $day => $timing) {
            if (!in_array($day, ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'])) {
                continue;
            }

            $is24 = isset($timing['is_24_hours']) && $timing['is_24_hours'] == "1";

            if (!$is24 && (!isset($timing['start_time']) || !isset($timing['end_time']))) {
                return redirect()->back()->with('error', "Start and End time required for $day if not 24 hours.");
            }

            if (isset($timing['selected']) && $timing['selected'] == "1") {
                $timings[] = [
                    'day' => $day,
                    'is_24_hours' => $is24,
                    'start_time' => $is24 ? null : $timing['start_time'],
                    'end_time' => $is24 ? null : $timing['end_time'],
                ];
            }
        }

        if (count($timings) < 1) {
            return redirect()->back()->with('error', 'You must provide at least one valid timing.');
        }

        DB::beginTransaction();
        try {

            $site = SitesModel::create([
                'customer_id' => $request->customer_id,
                'name' => $request->name,
                'type' => $request->type,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'emergency_protocol' => $request->emergency_protocol,
                'no_of_cameras' => $request->no_of_cameras,
                'camera_software' => $request->camera_software,
                'software_credentials' => $request->software_credentials,
                'token' => $this->generateRandom(),
                'status' => 1,
            ]);
            $contacts = array_map(function ($c) use ($site) {
                return [
                    'site_id' => $site->id,
                    'name' => $c['name'],
                    'phone' => $c['phone'],
                    'designation' => $c['designation'] ?? null,
                    'email' => $c['email'] ?? null,
                    'emergency_phone' => $c['emergency_phone'] ?? null,
                    'address' => $c['address'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $request->contacts);
            EmergencyContact::insert($contacts);
            foreach ($timings as &$t) {
                $t['site_id'] = $site->id;
                $t['created_at'] = now();
                $t['updated_at'] = now();
            }
            SiteTiming::insert($timings);

            DB::commit();
            return redirect('/loginportal/view-all-sites')->with('success', 'Site created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
