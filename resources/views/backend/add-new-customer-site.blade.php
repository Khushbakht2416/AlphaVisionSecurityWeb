@extends('backend.layouts.main2')
@section('title', 'Add Site for User')
@section('main-container')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add New Site</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item">Sites</li>
                <li class="breadcrumb-item active">Add New Site</li>
            </ol>
        </nav>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0" id="stepTitle">Site Details</h5>
                    </div>
                    <div class="card-body">
                        <form id="multiStepForm" method="POST" action="{{ url('/loginportal/create-new-site') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div id="step1" class="step">
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-6">
                                        <label>User</label>
                                        <select name="customer_id" class="form-select" required>
                                            <option value="">-- Choose User --</option>
                                            @foreach ($customers as $cust)
                                                <option value="{{ $cust->id }}" {{ old('customer_id') == $cust->id ? 'selected' : '' }}>{{ $cust->full_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Site Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Type</label>
                                        <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Camera Software</label>
                                        <input type="text" name="camera_software" class="form-control" value="{{ old('camera_software') }}">
                                        @error('camera_software')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="2">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Emergency Protocol</label>
                                    <textarea name="emergency_protocol" class="form-control" rows="2">{{ old('emergency_protocol') }}</textarea>
                                    @error('emergency_protocol')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>No of Cameras</label>
                                        <input type="number" name="no_of_cameras" class="form-control" value="{{ old('no_of_cameras') }}">
                                        @error('no_of_cameras')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Software Credentials</label>
                                        <input type="text" name="software_credentials" class="form-control" value="{{ old('software_credentials') }}">
                                        @error('software_credentials')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Pick Location</label>
                                    <div id="map" style="height: 300px;"></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control" id="latitude" value="{{ old('latitude') }}">
                                        @error('latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Longitude</label>
                                        <input type="text" name="longitude" class="form-control" id="longitude" value="{{ old('longitude') }}">
                                        @error('longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
                                </div>
                            </div>

                            <div id="step2" class="step d-none">
                                <div id="contacts-container" class="mb-3"></div>
                                <button type="button" class="btn btn-outline-secondary mb-3" onclick="addContact()">+ Add Contact</button>

                                <div class="text-between d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Previous</button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
                                </div>
                            </div>

                            <div id="step3" class="step d-none">
                                <div class="row mt-3">
                                    @foreach (['mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday', 'thu' => 'Thursday', 'fri' => 'Friday', 'sat' => 'Saturday', 'sun' => 'Sunday'] as $key => $day)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input day-selector" type="checkbox"
                                                    id="select-day-{{ $key }}"
                                                    data-day="{{ $key }}"
                                                    name="timings[{{ $key }}][selected]" value="1">
                                                <label class="form-check-label"
                                                    for="select-day-{{ $key }}">{{ $day }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                @foreach (['mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday', 'thu' => 'Thursday', 'fri' => 'Friday', 'sat' => 'Saturday', 'sun' => 'Sunday'] as $key => $day)
                                    <div class="card mb-3 mt-3 day-card" id="card-{{ $key }}"
                                        style="display:none;">
                                        <div class="card-body">
                                            <h6 class="card-title d-flex justify-content-between align-items-center">
                                                {{ $day }}
                                                <div class="form-check form-switch mb-0">
                                                    <input class="form-check-input time-toggle" type="checkbox"
                                                        name="timings[{{ $key }}][is_24_hours]"
                                                        value="1" checked data-target="{{ $key }}">
                                                    <label class="form-check-label">24 Hours</label>
                                                </div>
                                            </h6>
                                            <input type="hidden" name="timings[{{ $key }}][day]"
                                                value="{{ $key }}">
                                            <div class="row mt-2 time-range" id="time-range-{{ $key }}"
                                                style="display: none;">
                                                <div class="col-md-6">
                                                    <label>Start Time</label>
                                                    <input type="time"
                                                        name="timings[{{ $key }}][start_time]"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>End Time</label>
                                                    <input type="time"
                                                        name="timings[{{ $key }}][end_time]"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="text-between d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" onclick="nextStep(2)">Previous</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    let currentStep = 1;
    const stepTitles = {
        1: 'Site Details',
        2: 'Site Emergency Contact',
        3: 'Site Timing'
    };

    function nextStep(step) {
        document.querySelector(`#step${currentStep}`).classList.add('d-none');
        document.querySelector(`#step${step}`).classList.remove('d-none');
        document.getElementById('stepTitle').innerText = stepTitles[step];
        currentStep = step;
    }

    function addContact() {
        const container = document.getElementById('contacts-container');
        const index = container.children.length;
        const html = `
            <div class="border p-3 mb-3 mt-3 rounded shadow-sm">
                <h6>Contact ${index + 1}</h6>
                <div class="row mb-2">
                    <div class="col-md-6"><input type="text" name="contacts[${index}][name]" placeholder="Name" class="form-control" required></div>
                    <div class="col-md-6"><input type="text" name="contacts[${index}][phone]" placeholder="Phone" class="form-control" required></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><input type="text" name="contacts[${index}][designation]" placeholder="Designation" class="form-control"></div>
                    <div class="col-md-6"><input type="email" name="contacts[${index}][email]" placeholder="Email" class="form-control"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><input type="text" name="contacts[${index}][emergency_phone]" placeholder="Emergency Phone" class="form-control"></div>
                    <div class="col-md-6"><textarea name="contacts[${index}][address]" placeholder="Address" class="form-control"></textarea></div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('div.border').remove()">Delete</button>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    const map = L.map('map').setView([-25.2744, 133.7751], 5); // Australia
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const marker = L.marker([-25.2744, 133.7751], {
        draggable: true
    }).addTo(map);
    marker.on('dragend', function(e) {
        const latlng = marker.getLatLng();
        document.getElementById('latitude').value = latlng.lat;
        document.getElementById('longitude').value = latlng.lng;
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
    });

    document.querySelectorAll('.time-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const target = this.dataset.target;
            const container = document.getElementById('time-range-' + target);
            container.style.display = this.checked ? 'none' : 'flex';
        });
    });

    document.querySelectorAll('.day-selector').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const dayKey = this.dataset.day;
            const card = document.getElementById(`card-${dayKey}`);
            card.style.display = this.checked ? 'block' : 'none';
            if (!this.checked) {
                const toggle = card.querySelector('.time-toggle');
                toggle.checked = true;
                card.querySelector('.time-range').style.display = 'none';
            }
        });
    });
</script>

@endsection
