@extends('backend.layouts.main2')
@section('title', 'Site Details')
@section('main-container')

    <main id="main" class="main">
        <div class="container mt-5">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary">📍 Site Details</h2>
            </div>

            <div class="card shadow-sm border-0 mb-5">
                <div class="card-header bg-primary text-white">
                    <strong>{{ $site->name }}</strong>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong>Type:</strong> {{ $site->type }}</div>
                        <div class="col-md-6"><strong>User:</strong> {{ $site->customer->full_name ?? '-' }}</div>
                        <div class="col-md-6"><strong>Address:</strong> {{ $site->address }}</div>
                        <div class="col-md-6"><strong>Latitude:</strong> {{ $site->latitude }}</div>
                        <div class="col-md-6"><strong>Longitude:</strong> {{ $site->longitude }}</div>
                        <div class="col-md-6"><strong>Description:</strong> {{ $site->description }}</div>
                        <div class="col-md-6"><strong>Emergency Protocol:</strong> {{ $site->emergency_protocol }}</div>
                        <div class="col-md-6"><strong>No. of Cameras:</strong> {{ $site->no_of_cameras }}</div>
                        <div class="col-md-6"><strong>Camera Software:</strong> {{ $site->camera_software }}</div>
                        <div class="col-md-6"><strong>Software Credentials:</strong> {{ $site->software_credentials }}
                        </div>

                        <h4>Site Location Map</h4>
                        <div id="siteMap" style="height: 200px;" class="mb-4 rounded shadow-sm border"></div>

                    </div>
                </div>
            </div>

            <h4 class="mb-3 text-secondary">👥 Emergency Contacts</h4>
            @if ($site->emergencyContacts->count())
                <div class="row">
                    @foreach ($site->emergencyContacts as $contact)
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $contact->name }}</h5>
                                    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                                    <p><strong>Designation:</strong> {{ $contact->designation ?? '-' }}</p>
                                    <p><strong>Email:</strong> {{ $contact->email ?? '-' }}</p>
                                    <p><strong>Emergency Phone:</strong> {{ $contact->emergency_phone ?? '-' }}</p>
                                    <p><strong>Address:</strong> {{ $contact->address ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning">No emergency contacts found.</div>
            @endif

            <h4 class="mb-3 text-secondary">⏰ Timings</h4>
            @if ($site->timings->count())
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-dark">
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
                                    <td>{{ ucfirst($timing->day) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $timing->is_24_hours ? 'success' : 'secondary' }}">
                                            {{ $timing->is_24_hours ? 'Yes' : 'No' }}
                                        </span>
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
                </div>
            @else
                <div class="alert alert-warning">No timings found.</div>
            @endif

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var lat = {{ $site->latitude }};
            var lng = {{ $site->longitude }};

            var map = L.map('siteMap').setView([lat, lng], 5);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup("{{ $site->name }}<br>{{ $site->address }}")
                .openPopup();
        });
    </script>
@endsection
