@extends('loginportal.layouts.main2')

@section('title')
    Site Details - {{ $site->name }}
@endsection

@section('main-container')
    <div class="app-body">
        <div class="card mb-4">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="{{ asset(Session('customer')->profile_image) }}" class="img-5x rounded-circle"
                        alt="User Profile" />
                    <div class="ms-3 text-white">
                        <h5 class="mb-1">{{ Session('customer')->full_name }}</h5>
                        <h6 class="m-0 fw-light">User</h6>
                    </div>
                </div>
                <div>
                    <a href="{{ url('/customerportal/sites') }}" class="btn btn-danger">← Back to All Sites</a>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <span class="badge bg-secondary float-end">Last Updated: {{ $site->updated_at }}</span>
                <h5 class="card-title mb-0">Site Overview: {{ $site->name }}</h5>
            </div>
            <div class="card-body">
                <div class="row gx-4 mb-2">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card mb-4 card-bg">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 border border-white rounded-circle me-3">
                                        <div class="icon-box md bg-white rounded-5">
                                            <i class="bi bi-clock-history fs-4 text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h2>{{ $reportsHourlyCount }}</h2>
                                        <p class="m-0">Hourly Reports</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a href="{{ url('/customerportal/report/' . $site->token) }}">
                                        <span>View All</span>
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                    <div class="text-end">
                                        <p class="mb-0 text-white">+1</p>
                                        <span class="text-white small">this week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card mb-4 card-bg">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 border border-white rounded-circle me-3">
                                        <div class="icon-box md bg-white rounded-5">
                                            <i class="bi bi-exclamation-triangle fs-4 text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h2>{{ $reportsIncidentCount }}</h2>
                                        <p class="m-0">Incident Reports</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a href="{{ url('/customerportal/report/' . $site->token) }}">
                                        <span>View All</span>
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                    <div class="text-end">
                                        <p class="mb-0 text-white">+3</p>
                                        <span class="text-white small">this week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card mb-4 card-bg">
                            <div class="card-body text-white">
                                <div class="d-flex align-items-center">
                                    <div class="p-2 border border-white rounded-circle me-3">
                                        <div class="icon-box md bg-white rounded-5">
                                            <i class="bi bi-bar-chart fs-4 text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h2>{{ $reportsHourlyCount + $reportsIncidentCount }}</h2>
                                        <p class="m-0">All Reports</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <a href="{{ url('/customerportal/report/' . $site->token) }}">
                                        <span>View All</span>
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                    <div class="text-end">
                                        <p class="mb-0 text-white">+2</p>
                                        <span class="text-white small">this week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <hr class="my-4">

                    <h5 class="text-primary mb-3">Site Details</h5>
                    <div class="row gy-3">
                        <div class="col-md-6"><strong>Type:</strong> {{ $site->type }}</div>
                        <div class="col-md-6"><strong>Description:</strong> {{ $site->description }}</div>
                        <div class="col-md-6"><strong>Emergency Protocol:</strong> {{ $site->emergency_protocol }}</div>
                        <div class="col-md-6"><strong>No. of Cameras:</strong> {{ $site->no_of_cameras }}</div>
                        <div class="col-md-6"><strong>Camera Software:</strong> {{ $site->camera_software }}</div>
                        <div class="col-md-6"><strong>Software Credentials:</strong> {{ $site->software_credentials }}
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5 class="text-primary mb-3">👥 Emergency Contacts</h5>
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

                    <hr class="my-4">

                    <h5 class="text-primary mb-3">Site Timings</h5>
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
                                                <span
                                                    class="badge bg-{{ $timing->is_24_hours ? 'success' : 'secondary' }}">
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

                <hr class="my-4">
                <h5 class="text-primary mb-3">Site Location</h5>
                <div class="mb-2 d-flex justify-content-center">
                    <div id="map" style="height: 200px; width: 100%; border-radius: 12px; box-shadow: 0 0 10px #000;">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .leaflet-popup-content-wrapper {
            background-color: rgba(0, 0, 0, 0.7);
            color: #FF0000;
            border: 1px solid #FF0000;
        }

        .leaflet-popup-tip {
            background: rgba(0, 0, 0, 0.7);
        }

        .zoom-level-display {
            background: rgba(0, 0, 0, 0.7);
            color: #FF0000;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-family: monospace;
        }

        #map::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0) 80%);
            pointer-events: none;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const latitude = {{ $site->latitude }};
            const longitude = {{ $site->longitude }};

            const map = L.map('map', {
                center: [latitude, longitude],
                zoom: 1,
                zoomControl: false
            });

            L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://carto.com/">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 1
            }).addTo(map);

            const redIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            L.marker([latitude, longitude], {
                    icon: redIcon
                }).addTo(map)
                .bindPopup("📍 <strong>{{ $site->name }}</strong>")
                .openPopup();

            const zoomDisplay = L.control({
                position: 'bottomleft'
            });
            zoomDisplay.onAdd = function() {
                const div = L.DomUtil.create('div', 'zoom-level-display');
                div.innerHTML = 'Zoom: ' + map.getZoom();
                map.on('zoomend', () => {
                    div.innerHTML = 'Zoom: ' + map.getZoom();
                });
                return div;
            };
            zoomDisplay.addTo(map);
        });
    </script>

@endsection
