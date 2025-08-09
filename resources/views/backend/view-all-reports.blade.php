@extends('backend.layouts.main2')
@section('title', 'All Reports')
@section('main-container')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>All Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </nav>
        </div>

        <center>
            @if ($message = Session::get('success'))
                <div class="alert alert-success p-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger p-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </center>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage All Reports</h5>

                            <div class="text-right mb-3">
                                <!-- Button to add new report -->
                                <a href="{{ url('/loginportal/create-new-report') }}" class="btn btn-primary"
                                    data-bs-toggle="popover" title="Add New Report"
                                    data-bs-content="Click here to add a new report for this site.">
                                    <i class="fas fa-plus"></i> Add New Report
                                </a>
                            </div>

                            <p>Use filters to manage specific reports.</p>
                            <!-- Filter Controls -->
                            <div class="row mb-3">
                                <div class="col-md-4 mb-1">
                                    <select id="customerFilter" class="form-select">
                                        <option value="">Filter by User</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->full_name }}">{{ $customer->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <select id="siteFilter" class="form-select">
                                        <option value="">Filter by Site</option>
                                        @foreach ($sites as $site)
                                            <option value="{{ $site->name }}">{{ $site->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <select id="reportTypeFilter" class="form-select">
                                        <option value="">Filter by Report Type</option>
                                        <option value="hourly">General</option>
                                        <option value="incident">Incident</option>
                                    </select>
                                </div>
                            </div>

                            @if ($reports->isEmpty())
                                <div class="alert alert-warning text-center">
                                    <h4>No reports found.</h4>
                                </div>
                            @else
                                <table class="table table-striped text-center" id="reportsTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Report Image</th>
                                            <th>User</th>
                                            <th>Site</th>
                                            <th>Report Type</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reports as $report)
                                            <tr>
                                                <td>{{ $report->id }}</td>
                                                <td>
                                                    @if ($report->report_images && is_array(json_decode($report->report_images)))
                                                        <div class="d-flex justify-content-center">
                                                            @foreach (json_decode($report->report_images) as $image)
                                                                <img src="{{ asset($image) }}" alt="Report Image"
                                                                    class="rounded-circle" width="45" height="45"
                                                                    style="margin: 5px;">
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <span class="text-muted">No Images</span>
                                                    @endif
                                                </td>
                                                <td>{{ $report->site->customer->full_name ?? 'N/A' }}</td>
                                                <td>{{ $report->site->name ?? 'N/A' }}</td>
                                                <td data-type="{{ strtolower($report->report_type) }}">
                                                    {{ strtolower($report->report_type) === 'hourly' ? 'General' : ucfirst($report->report_type) }}
                                                </td>
                                                <td>{{ $report->report_date }}</td>
                                                <td>
                                                    <a href="{{ url('/loginportal/edit-report/' . $report->id) }}"
                                                        class="btn btn-warning" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Edit this report">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/loginportal/delete-report/' . $report->id) }}"
                                                        class="btn btn-danger" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Delete this report">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            <div id="noResultsMessage" class="alert alert-warning text-center" style="display:none;">
                                <h4>No results found.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl, {
                    trigger: 'hover'
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const siteFilter = document.getElementById("siteFilter");
            const customerFilter = document.getElementById("customerFilter");
            const reportTypeFilter = document.getElementById("reportTypeFilter");
            const rows = document.querySelectorAll("#reportsTable tbody tr");
            const noResultsMessage = document.getElementById("noResultsMessage");

            function filterTable() {
                const site = siteFilter.value.trim().toLowerCase();
                const customer = customerFilter.value.trim().toLowerCase();
                const reportType = reportTypeFilter.value.trim().toLowerCase();
                let visible = 0;

                rows.forEach(row => {
                    const customerText = row.cells[2].innerText.trim().toLowerCase(); // User
                    const siteText = row.cells[3].innerText.trim().toLowerCase(); // Site
                    const reportTypeText = row.cells[4]?.dataset.type;// Report Type

                    const matchesCustomer = !customer || customerText.includes(customer);
                    const matchesSite = !site || siteText.includes(site);
                    const matchesReportType = !reportType || reportTypeText === reportType;

                    if (matchesCustomer && matchesSite && matchesReportType) {
                        row.style.display = "";
                        visible++;
                    } else {
                        row.style.display = "none";
                    }
                });

                noResultsMessage.style.display = visible ? "none" : "block";
            }

            // Add event listeners to each filter dropdown
            siteFilter.addEventListener("change", filterTable);
            customerFilter.addEventListener("change", filterTable);
            reportTypeFilter.addEventListener("change", filterTable);
        });
    </script>


@endsection
