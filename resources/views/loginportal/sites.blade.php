@extends('loginportal.layouts.main1')
@section('title', 'Sites')
@section('main-container')
<div class="app-body">
    <div class="row gx-4">
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row gx-4">
                        <div class="px-0 border-end col-xl-4 col-sm-6">
                            <div class="text-center">
                                <p>Total Sites</p>
                                <h2 class="my-2">{{ $totalSites }}</h2>
                                <p class="m-0">
                                    <span class="text-danger">All registered sites</span>
                                </p>
                            </div>
                        </div>
                        <div class="px-0 border-end col-xl-4 col-sm-6">
                            <div class="text-center">
                                <p>Active Sites</p>
                                <h2 class="my-2">{{ $activeCount }}</h2>
                                <p class="m-0">
                                    <span class="text-danger">
                                        <i class="bi bi-check-circle"></i>
                                        Currently online
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="px-0 col-xl-4 col-sm-6">
                            <div class="text-center">
                                <p>Inactive Sites</p>
                                <h2 class="my-2">{{ $inactiveCount }}</h2>
                                <p class="m-0">
                                    <span class="text-danger">
                                        <i class="bi bi-x-circle"></i>
                                        Not reachable
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Row ends -->
                </div>
            </div>
        </div>
    </div>

    <div class="row gx-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-bg">
                        <div class="table-responsive">
                            <table id="customButtons" class="table truncate text-center align-middle">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Site Name</th>
                                        <th>Site Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sites as $index => $site)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $site->name }}</td>
                                        <td>{{ $site->address }}</td>
                                        <td>
                                            @if (in_array($site->id, $activeSiteIds))
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ url('/customerportal/site', $site->token) }}" class="btn btn-sm btn-outline-light me-2 text-white border-white">View Site</a>
                                            <a href="{{ url('/customerportal/report', $site->token) }}" class="btn btn-sm btn-outline-danger">View Reports</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
