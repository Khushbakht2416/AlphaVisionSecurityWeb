@extends('backend.layouts.main2')
@section('title', 'Edit Site')
@section('main-container')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Site for User: {{ $site->customer->full_name }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                    <li class="breadcrumb-item">Sites</li>
                    <li class="breadcrumb-item active">Edit Site</li>
                </ol>
            </nav>
        </div>

        <center>
            @if ($message = Session::get('success'))
                <div class="alert alert-block p-4 border-left-success">
                    <strong>
                        <h1 style="color:#354cc1">{{ $message }}</h1>
                    </strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-block p-4 border-left-warning">
                    <strong>
                        <h1 style="color:#ff0101">{{ $message }}</h1>
                    </strong>
                </div>
            @endif
        </center>

        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0" id="stepTitle">Site Details</h5>
                        </div>
                        <div class="card-body">
                            <form id="multiStepForm" method="POST"
                                action="{{ url('/loginportal/edit-site/' . $site->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div id="step1" class="step">
                                    <div class="row mb-3 mt-3">
                                        <div class="col-md-6">
                                            <input type="hidden" name="customer_id" value="{{ $site->customer->id }}">
                                            <label>Site Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $site->name) }}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Type</label>
                                            <input type="text" name="type" class="form-control"
                                                value="{{ old('type', $site->type) }}">
                                            @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label>Camera Software</label>
                                            <input type="text" name="camera_software" class="form-control"
                                                value="{{ old('camera_software', $site->camera_software) }}">
                                            @error('camera_software')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="2">{{ old('address', $site->address) }}</textarea>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="2">{{ old('description', $site->description) }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label>Emergency Protocol</label>
                                        <textarea name="emergency_protocol" class="form-control" rows="2">{{ old('emergency_protocol', $site->emergency_protocol) }}</textarea>
                                        @error('emergency_protocol')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>No of Cameras</label>
                                            <input type="number" name="no_of_cameras" class="form-control"
                                                value="{{ old('no_of_cameras', $site->no_of_cameras) }}">
                                            @error('no_of_cameras')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Software Credentials</label>
                                            <input type="text" name="software_credentials" class="form-control"
                                                value="{{ old('software_credentials', $site->software_credentials) }}">
                                            @error('software_credentials')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Pick Location</label>
                                        <div id="siteMap" style="height: 200px;" class="mb-4 rounded shadow-sm border">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Latitude</label>
                                            <input type="text" name="latitude" class="form-control" id="latitude"
                                                value="{{ old('latitude', $site->latitude) }}">
                                            @error('latitude')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Longitude</label>
                                            <input type="text" name="longitude" class="form-control" id="longitude"
                                                value="{{ old('longitude', $site->longitude) }}">
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
                                    <div id="contacts-container" class="mb-3">
                                        @foreach ($site->emergencyContacts as $index => $contact)
                                            <div class="border p-3 mb-3 mt-3 rounded shadow-sm">
                                                <h6>Contact {{ $index + 1 }}</h6>
                                                <div class="row mb-2">
                                                    <div class="col-md-6"><input type="text"
                                                            name="contacts[{{ $index }}][name]"
                                                            value="{{ old('contacts.' . $index . '.name', $contact->name) }}"
                                                            placeholder="Name" class="form-control" required></div>
                                                    <div class="col-md-6"><input type="text"
                                                            name="contacts[{{ $index }}][phone]"
                                                            value="{{ old('contacts.' . $index . '.phone', $contact->phone) }}"
                                                            placeholder="Phone" class="form-control" required></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6"><input type="text"
                                                            name="contacts[{{ $index }}][designation]"
                                                            value="{{ old('contacts.' . $index . '.designation', $contact->designation) }}"
                                                            placeholder="Designation" class="form-control"></div>
                                                    <div class="col-md-6"><input type="email"
                                                            name="contacts[{{ $index }}][email]"
                                                            value="{{ old('contacts.' . $index . '.email', $contact->email) }}"
                                                            placeholder="Email" class="form-control"></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6"><input type="text"
                                                            name="contacts[{{ $index }}][emergency_phone]"
                                                            value="{{ old('contacts.' . $index . '.emergency_phone', $contact->emergency_phone) }}"
                                                            placeholder="Emergency Phone" class="form-control"></div>
                                                    <div class="col-md-6">
                                                        <textarea name="contacts[{{ $index }}][address]" placeholder="Address" class="form-control">{{ old('contacts.' . $index . '.address', $contact->address) }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="this.closest('div.border').remove()">Delete</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary mb-3"
                                        onclick="addContact()">+ Add Contact</button>

                                    <div class="text-between d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="nextStep(1)">Previous</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="nextStep(3)">Next</button>
                                    </div>
                                </div>
                                <div id="step3" class="step d-none">
                                    <div class="row mt-3">
                                        @php
                                            $days = [
                                                'mon' => 'Monday',
                                                'tue' => 'Tuesday',
                                                'wed' => 'Wednesday',
                                                'thu' => 'Thursday',
                                                'fri' => 'Friday',
                                                'sat' => 'Saturday',
                                                'sun' => 'Sunday',
                                            ];
                                        @endphp
                                        @foreach ($days as $key => $label)
                                            @php
                                                $dayTiming = $site->timings->where('day', $key)->first();
                                                $selected = (bool) $dayTiming;
                                                $is24 = $dayTiming && $dayTiming->is_24_hours;
                                            @endphp

                                            <div class="col-md-6 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input day-selector" type="checkbox"
                                                        id="select-day-{{ $key }}"
                                                        data-day="{{ $key }}"
                                                        name="timings[{{ $key }}][selected]" value="1"
                                                        {{ $selected ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="select-day-{{ $key }}">
                                                        {{ $label }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @foreach ($days as $key => $label)
                                        @php
                                            $dayTiming = $site->timings->where('day', $key)->first();
                                            $selected = (bool) $dayTiming;
                                            $is24 = $dayTiming && $dayTiming->is_24_hours;
                                            $start =
                                                $dayTiming && $dayTiming->start_time
                                                    ? \Carbon\Carbon::parse($dayTiming->start_time)->format('H:i')
                                                    : '';
                                            $end =
                                                $dayTiming && $dayTiming->end_time
                                                    ? \Carbon\Carbon::parse($dayTiming->end_time)->format('H:i')
                                                    : '';
                                        @endphp

                                        <div class="card mb-3 mt-3 day-card" id="card-{{ $key }}"
                                            style="display: {{ $selected ? 'block' : 'none' }};">
                                            <div class="card-body">
                                                <h6 class="card-title d-flex justify-content-between align-items-center">
                                                    {{ $label }}
                                                    <div class="form-check form-switch mb-0">
                                                        <input class="form-check-input time-toggle" type="checkbox"
                                                            id="toggle-{{ $key }}"
                                                            data-day="{{ $key }}"
                                                            name="timings[{{ $key }}][is_24_hours]"
                                                            value="1" {{ $is24 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="toggle-{{ $key }}">
                                                            24 Hours
                                                        </label>
                                                    </div>
                                                </h6>
                                                <input type="hidden" name="timings[{{ $key }}][day]"
                                                    value="{{ $key }}">
                                                <div class="row time-range mt-2" id="time-range-{{ $key }}"
                                                    style="display: {{ $selected && !$is24 ? 'flex' : 'none' }};">
                                                    <div class="row g-4 d-flex justify-between">
                                                        <div class="col-md-6 ">
                                                            <input type="time"
                                                                name="timings[{{ $key }}][start_time]"
                                                                class="form-control"
                                                                value="{{ old('timings.' . $key . '.start_time', $start) }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="time"
                                                                name="timings[{{ $key }}][end_time]"
                                                                class="form-control"
                                                                value="{{ old('timings.' . $key . '.end_time', $end) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="nextStep(2)">Previous</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    const days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

                                    days.forEach(day => {
                                        const checkbox = document.getElementById(`select-day-${day}`);
                                        const toggle = document.getElementById(`toggle-${day}`);
                                        const card = document.getElementById(`card-${day}`);
                                        const range = document.getElementById(`time-range-${day}`);

                                        function updateUI() {
                                            if (!checkbox.checked) {
                                                card.style.display = 'none';
                                                return;
                                            }
                                            card.style.display = '';
                                            range.style.display = toggle.checked ? 'none' : 'flex';
                                        }
                                        checkbox.addEventListener('change', () => {
                                            if (checkbox.checked) {
                                                toggle.checked = true;
                                            }
                                            updateUI();
                                        });
                                        toggle.addEventListener('change', updateUI);
                                        updateUI();
                                    });
                                });

                                function nextStep(step) {
                                    document.querySelectorAll('.step').forEach((el, i) => {
                                        el.classList.toggle('d-none', i + 1 !== step);
                                    });
                                    document.getElementById('stepTitle').innerText = `Step ${step}`;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let lat = parseFloat({{ $site->latitude ?? 0 }}) || 0;
            let lng = parseFloat({{ $site->longitude ?? 0 }}) || 0;

            const map = L.map('siteMap').setView([lat, lng], 4);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            let marker = L.marker([lat, lng], {
                    draggable: true
                }).addTo(map)
                .bindPopup("{{ $site->name }}<br>{{ $site->address }}").openPopup();
            marker.on('dragend', function(e) {
                const position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat.toFixed(6);
                document.getElementById('longitude').value = position.lng.toFixed(6);
            });
            map.on('click', function(e) {
                const {
                    lat,
                    lng
                } = e.latlng;
                marker.setLatLng([lat, lng]);
                document.getElementById('latitude').value = lat.toFixed(6);
                document.getElementById('longitude').value = lng.toFixed(6);
            });
            document.getElementById('latitude').addEventListener('input', updateMarker);
            document.getElementById('longitude').addEventListener('input', updateMarker);

            function updateMarker() {
                const lat = parseFloat(document.getElementById('latitude').value);
                const lng = parseFloat(document.getElementById('longitude').value);

                if (!isNaN(lat) && !isNaN(lng)) {
                    marker.setLatLng([lat, lng]);
                    map.setView([lat, lng], 5);
                }
            }

            document.querySelectorAll('.day-selector').forEach(dayCheckbox => {
                dayCheckbox.addEventListener('change', function() {
                    const day = this.getAttribute('data-day');
                    const card = document.getElementById('card-' + day);
                    const timeRange = document.getElementById('time-range-' + day);
                    const toggleSwitch = document.querySelector(`#card-${day} .time-toggle`);

                    if (this.checked) {
                        card.style.display = 'block';
                        if (toggleSwitch.checked) {
                            timeRange.style.display = 'none';
                        } else {
                            timeRange.style.display = 'block';
                        }
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            document.querySelectorAll('.time-toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const target = this.getAttribute('data-target');
                    const timeRange = document.getElementById('time-range-' + target);
                    if (this.checked) {
                        timeRange.style.display = 'none';
                    } else {
                        timeRange.style.display = 'block';
                    }
                });
            });


            document.querySelectorAll('.day-selector').forEach(dayCheckbox => {
                const day = dayCheckbox.getAttribute('data-day');
                const card = document.getElementById('card-' + day);
                const timeRange = document.getElementById('time-range-' + day);
                const toggleSwitch = document.querySelector(`#card-${day} .time-toggle`);

                if (dayCheckbox.checked) {
                    card.style.display = 'block';
                    if (toggleSwitch.checked) {
                        timeRange.style.display = 'none';
                    } else {
                        timeRange.style.display = 'block';
                    }
                } else {
                    card.style.display = 'none';
                }
            });
        });

        function nextStep(step) {
            document.querySelectorAll('.step').forEach((el, index) => {
                el.classList.toggle('d-none', index + 1 !== step);
            });
            document.getElementById('stepTitle').innerText = `Step ${step}`;
        }

        function addContact() {
            const container = document.getElementById('contacts-container');
            const contactIndex = container.children.length;
            const contactHTML = `
            <div class="border p-3 mb-3 mt-3 rounded shadow-sm">
                <h6>Contact ${contactIndex + 1}</h6>
                <div class="row mb-2">
                    <div class="col-md-6"><input type="text" name="contacts[${contactIndex}][name]" placeholder="Name" class="form-control" required></div>
                    <div class="col-md-6"><input type="text" name="contacts[${contactIndex}][phone]" placeholder="Phone" class="form-control" required></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><input type="text" name="contacts[${contactIndex}][designation]" placeholder="Designation" class="form-control"></div>
                    <div class="col-md-6"><input type="email" name="contacts[${contactIndex}][email]" placeholder="Email" class="form-control"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><input type="text" name="contacts[${contactIndex}][emergency_phone]" placeholder="Emergency Phone" class="form-control"></div>
                    <div class="col-md-6"><textarea name="contacts[${contactIndex}][address]" placeholder="Address" class="form-control"></textarea></div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('div.border').remove()">Delete</button>
                </div>
            </div>
            `;
            container.insertAdjacentHTML('beforeend', contactHTML);
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const initDayUI = () => {
                document.querySelectorAll('.day-selector').forEach(dayCheckbox => {
                    const day = dayCheckbox.dataset.day;
                    const card = document.getElementById(`card-${day}`);
                    const toggle = card.querySelector('.time-toggle');
                    const timeRange = document.getElementById(`time-range-${day}`);

                    if (dayCheckbox.checked) {
                        card.style.display = 'block';
                        if (toggle.checked) {
                            timeRange.style.display = 'none';
                        } else {
                            timeRange.style.display = 'block';
                        }
                    } else {
                        card.style.display = 'none';
                    }
                });
            };

            // When day checkbox is toggled
            document.querySelectorAll('.day-selector').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const day = this.dataset.day;
                    const card = document.getElementById(`card-${day}`);
                    const toggle = card.querySelector('.time-toggle');
                    const timeRange = document.getElementById(`time-range-${day}`);

                    if (this.checked) {
                        card.style.display = 'block';
                        toggle.checked = true; // default to 24 hours
                        timeRange.style.display = 'none';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // When 24 hour toggle is switched
            document.querySelectorAll('.time-toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const day = this.dataset.target;
                    const timeRange = document.getElementById(`time-range-${day}`);
                    if (this.checked) {
                        timeRange.style.display = 'none';
                    } else {
                        timeRange.style.display = 'block';
                    }
                });
            });

            initDayUI();
        });
    </script>


@endsection
