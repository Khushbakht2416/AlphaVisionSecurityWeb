@extends('backend.layouts.main2')
@section('title', 'Reports for Site - ' . $site->name)
@section('main-container')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Reports for {{ $site->name }} (User: {{ $site->customer->full_name }})</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/loginportal/view-sites') }}">Sites</a></li>
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
                        <h5 class="card-title">Reports for {{ $site->name }}</h5>
                        <p>Manage and view reports for this site!</p>
                        <div class="text-right mb-3">
                            <a href="{{ url('/loginportal/create-new-report/' . $site->id) }}" class="btn btn-primary"
                                data-bs-toggle="popover" title="Add New Report"
                                data-bs-content="Click to create a new report for this site.">
                                <i class="fas fa-plus"></i> Add New Report
                            </a>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6 mb-2">
                                <select id="reportTypeFilter" class="form-control">
                                    <option value="">All Report Types</option>
                                    <option value="hourly">General</option>
                                    <option value="incident">Incident</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" id="reportSearch" class="form-control" placeholder="Search reports...">
                            </div>
                        </div>

                        @if($reports->isEmpty())
                        <div class="alert alert-warning text-center">
                            <h4>No reports found for this site.</h4>
                        </div>
                        @else
                        <table class="table table-striped text-center" id="reportsTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Report Image</th>
                                    <th>Report Type</th>
                                    <th>Report Date</th>
                                    <th>Report Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>
                                        @if($report->report_images && is_array(json_decode($report->report_images)))
                                        <div class="d-flex justify-content-center">
                                            @foreach (json_decode($report->report_images) as $image)
                                            <img src="{{ asset($image) }}" alt="Report Image" class="rounded-circle"
                                                width="45" height="45" style="margin: 5px;">
                                            @endforeach
                                        </div>
                                        @else
                                        <span class="text-muted">No Images</span>
                                        @endif
                                    </td>
                                    <td data-type="{{ strtolower($report->report_type) }}">
                                        {{ strtolower($report->report_type) === 'hourly' ? 'General' : ucfirst($report->report_type) }}
                                    </td>
                                    <td>{{ $report->report_date }}</td>
                                    <td>
                                        {{ $report->description }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/loginportal/edit-report/' . $report->id) }}"
                                            class="btn btn-warning" data-bs-toggle="popover" data-bs-placement="top"
                                            data-bs-content="Edit this report">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/loginportal/delete-report/' . $report->id) }}"
                                            class="btn btn-danger" data-bs-toggle="popover" data-bs-placement="top"
                                            data-bs-content="Delete this report">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="noReportsMessage" class="alert alert-warning text-center" style="display: none;">
                            <h4>No reports found.</h4>
                        </div>
                        @endif
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
    document.addEventListener("DOMContentLoaded", function () {
        const reportSearch = document.getElementById("reportSearch");
        const reportTypeFilter = document.getElementById("reportTypeFilter");
        const rows = document.querySelectorAll("#reportsTable tbody tr");
        const noReportsMessage = document.getElementById("noReportsMessage");

        function filterRows() {
            const searchQuery = reportSearch.value.trim().toLowerCase();
            const selectedType = reportTypeFilter.value.trim().toLowerCase();
            let visibleCount = 0;

            rows.forEach(row => {
                const cells = row.getElementsByTagName("td");
                const reportTypeText = cells[2]?.dataset.type;
                const rowText = row.innerText.toLowerCase();

                const matchesSearch = !searchQuery || rowText.includes(searchQuery);
                const matchesType = !selectedType || reportTypeText === selectedType;

                if (matchesSearch && matchesType) {
                    row.style.display = "";
                    visibleCount++;
                } else {
                    row.style.display = "none";
                }
            });

            noReportsMessage.style.display = visibleCount === 0 ? "block" : "none";
        }

        // Event listeners
        reportSearch.addEventListener("input", filterRows);
        reportTypeFilter.addEventListener("change", filterRows);

        // Initial filter on load
        filterRows();
    });
</script>


@endsection
