@extends('loginportal.layouts.main')
@section('title', 'Dashboard')

@section('main-container')
    <div class="app-body">
        <div class="row gx-4">

            <div class="col-xl-3 col-sm-6 col-12">
                <a href="{{ url('customerportal/sites') }}" class="text-decoration-none">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="m-0 text-white">
                                <div class="fw-semibold mb-3">Total Sites</div>
                                <div class="position-relative">
                                    <h2>{{ $totalSites }} Sites</h2>
                                    <span class="badge bg-white text-danger small mb-3">
                                        <i
                                            class="bi bi-exclamation-circle-fill me-1 text-danger"></i>{{ $totalSites - $activeSites }}
                                        new this week
                                    </span>
                                    <div><span class="badge bg-dark me-1 py-2 w-100">{{ $activeSites }} Active</span></div>
                                    <i
                                        class="bi bi-pin-map display-3 text-white position-absolute end-0 top-0 opacity-25 mt-n4"></i>
                                </div>
                                <div class="mt-3">
                                    <div class="small">
                                        Updated on
                                        <span class="opacity-50">
                                            @if ($sitesLastUpdatedTime)
                                                {{ \Carbon\Carbon::parse($sitesLastUpdatedTime->updated_at)->format('l, h:i A') }}
                                            @else
                                                No Update
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <a href="{{ url('customerportal/reports') }}" class="text-decoration-none">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="m-0 text-white">
                                <div class="fw-semibold mb-3">Hourly Reports</div>
                                <div class="position-relative">
                                    <h2>{{ $hourlyReportsCount }} Reports</h2>
                                    <span class="badge bg-white text-danger small mb-3">
                                        <i
                                            class="bi bi-exclamation-circle-fill me-1 text-danger"></i>{{ $newHourlyLast24h }}
                                        new in last 24h
                                    </span>
                                    <div><span class="badge bg-dark me-1 py-2 w-100">{{ $hourlyReportsCount }} /
                                            {{ $totalReportsCount }}</span></div>
                                    <i
                                        class="bi bi-bar-chart-line display-3 text-white position-absolute end-0 top-0 opacity-25 mt-n4"></i>
                                </div>
                                <div class="mt-3">
                                    <div class="small">
                                        Updated on
                                        <span class="opacity-50">
                                            @if ($hourlyReportLastUpdatedTime)
                                                {{ \Carbon\Carbon::parse($hourlyReportLastUpdatedTime->updated_at)->format('l, h:i A') }}
                                            @else
                                                No Update
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <a href="{{ url('customerportal/reports') }}" class="text-decoration-none">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="m-0 text-white">
                                <div class="fw-semibold mb-3">Incident Reports</div>
                                <div class="position-relative">
                                    <h2>{{ $incidentReportsCount }} Reports</h2>
                                    <span class="badge bg-white text-danger small mb-3">
                                        <i
                                            class="bi bi-exclamation-circle-fill me-1 text-danger"></i>{{ $newIncidentLast7d }}
                                        new this week
                                    </span>
                                    <div><span class="badge bg-dark me-1 py-2 w-100">{{ $incidentReportsCount }} /
                                            {{ $totalReportsCount }}</span></div>
                                    <i
                                        class="bi bi-window-sidebar display-3 text-white position-absolute end-0 top-0 opacity-25 mt-n4"></i>
                                </div>
                                <div class="mt-3">
                                    <div class="small">
                                        Updated on
                                        <span class="opacity-50">
                                            @if ($incidentReportLastUpdatedTime)
                                                {{ \Carbon\Carbon::parse($incidentReportLastUpdatedTime->updated_at)->format('l, h:i A') }}
                                            @else
                                                No Update
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <a href="{{ url('customerportal/reports') }}" class="text-decoration-none">
                    <div class="card mb-4 card-bg">
                        <div class="card-body">
                            <div class="m-0 text-white">
                                <div class="fw-semibold mb-3">Total Reports</div>
                                <div class="position-relative">
                                    <h2>{{ $totalReportsCount }} Reports</h2>
                                    <span class="badge bg-white text-danger small mb-3">
                                        <i
                                            class="bi bi-exclamation-circle-fill me-1 text-danger"></i>{{ $newReportsLast7d }}
                                        new this week
                                    </span>
                                    <div><span class="badge bg-dark me-1 py-2 w-100">+100%</span></div>
                                    <i
                                        class="bi bi-bar-chart-line display-3 text-white position-absolute end-0 top-0 opacity-25 mt-n4"></i>
                                </div>
                                <div class="mt-3">
                                    <div class="small">
                                        Updated on
                                        <span class="opacity-50">
                                            @if ($totalReportLastUpdatedTime)
                                                {{ \Carbon\Carbon::parse($totalReportLastUpdatedTime->updated_at)->format('l,
                                                                                                                                        h:i A') }}
                                            @else
                                                No Update
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
