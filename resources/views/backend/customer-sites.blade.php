@extends('backend.layouts.main2')
@section('title', 'User Sites')
@section('main-container')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sites for {{ $customer->full_name }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/loginportal/customers') }}">Users</a></li>
                    <li class="breadcrumb-item active">Sites</li>
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
                            <h5 class="card-title">Sites for {{ $customer->full_name }}</h5>
                            <p>Manage sites for this user!</p>

                            <div class="text-right mb-3">
                                <a href="{{ url('/loginportal/add-site/' . $customer->id) }}" class="btn btn-primary"
                                    data-bs-toggle="popover" title="Add New Site"
                                    data-bs-content="Click here to add a new site for this user.">
                                    <i class="fas fa-plus"></i> Add New Site
                                </a>
                            </div>

                            @if ($sites->isEmpty())
                                <div class="alert alert-warning text-center">
                                    <h4>No sites found for this user.</h4>
                                </div>
                            @else
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="Search Sites...">
                                </div>

                                <table class="table table-striped text-center" id="sitesTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Site Name</th>
                                            <th>Address</th>
                                            <th>Timings</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sites as $site)
                                            <tr>
                                                <td>{{ $site->id }}</td>
                                                <td>{{ $site->name }}</td>
                                                <td>{{ Str::limit($site->address ?? 'N/A', 30, '...') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                        data-bs-target="#timingModal{{ $site->id }}"
                                                        data-bs-placement="top" data-bs-content="View Timings of this Site"
                                                        data-bs-trigger="hover">
                                                        <i class="fas fa-clock"></i>
                                                    </button>
                                                    <div class="modal fade" id="timingModal{{ $site->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="timingModalLabel{{ $site->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="timingModalLabel{{ $site->id }}">Timings
                                                                        for {{ $site->name }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @if ($site->timings->isEmpty())
                                                                        <p>No timing information available for this site.
                                                                        </p>
                                                                    @else
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Day</th>
                                                                                    <th>24 Hours</th>
                                                                                    <th>Start Time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($site->timings as $timing)
                                                                                    <tr>
                                                                                        <td>{{ ucfirst($timing->day) }}
                                                                                        </td>
                                                                                        <td>{{ $timing->is_24_hours ? 'Yes' : 'No' }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $timing->is_24_hours ? '-' : \Carbon\Carbon::parse($timing->start_time)->format('h:i A') }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $timing->is_24_hours ? '-' : \Carbon\Carbon::parse($timing->end_time)->format('h:i A') }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="{{ url('/loginportal/view-site/' . $site->id) }}"
                                                        class="btn btn-primary"
                                                        data-bs-toggle="popover" data-bs-placement="top"
                                                        data-bs-content="View Site Details">
                                                         <i class="fas fa-eye"></i>
                                                     </a>
                                                    <a href="{{ url('/loginportal/view-reports/' . $site->id) }}"
                                                        class="btn btn-info" data-bs-toggle="popover"
                                                        data-bs-placement="top"
                                                        data-bs-content="View Reports for this site">
                                                        <i class="fas fa-chart-bar"></i>
                                                    </a>
                                                    <a href="{{ url('/loginportal/edit-site/' . $site->id) }}"
                                                        class="btn btn-warning" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Edit this site">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/loginportal/delete-site/' . $site->id) }}"
                                                        class="btn btn-danger" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Delete this site">
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
            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-content]'));
            popoverTriggerList.forEach(function(el) {
                new bootstrap.Popover(el);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl, {
                    trigger: 'hover'
                });
            });


            document.getElementById("searchInput").addEventListener("keyup", function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll("#sitesTable tbody tr");
                let noResultsMessage = document.getElementById("noResultsMessage");
                let visibleRows = 0;

                rows.forEach(row => {
                    let text = row.innerText.toLowerCase();
                    if (text.includes(filter)) {
                        row.style.display = "";
                        visibleRows++;
                    } else {
                        row.style.display = "none";
                    }
                });

                noResultsMessage.style.display = visibleRows === 0 ? "block" : "none";
            });
        });
    </script>

@endsection
