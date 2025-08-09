@extends('backend.layouts.main2')
@section('title', 'Edit Report for Site')
@section('main-container')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Report for Site: {{ $site->name }} (User: {{ $site->customer->full_name }})</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item">Reports</li>
                <li class="breadcrumb-item active">Edit Report</li>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Report Information</h5>
                        <p>Update the details for this report.</p>

                        <!-- Edit Report Form -->
                        <form method="POST" action="{{ url('/loginportal/update-site-report/' . $report->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Report Date -->
                            <div class="form-group mb-3">
                                <label for="report_date" class="form-label">Report Date</label>
                                <input type="datetime-local" name="report_date" class="form-control" id="report_date"
                                    required
                                    value="{{ old('report_date', \Carbon\Carbon::parse($report->report_date)->format('Y-m-d\TH:i')) }}">
                                @error('report_date')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Report Type -->
                            <div class="form-group mb-3">
                                <label for="report_type" class="form-label">Report Type</label>
                                <select name="report_type" class="form-control" id="report_type" required>
                                    <option value="hourly" {{ old('report_type', $report->report_type) == 'hourly' ?
                                        'selected' : '' }}>
                                        General</option>
                                    <option value="incident" {{ old('report_type', $report->report_type) == 'incident' ?
                                        'selected' : '' }}>
                                        Incident</option>
                                </select>
                                @error('report_type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Report Description</label>
                                <textarea name="description" class="form-control" id="description"
                                    rows="4">{{ old('description', $report->description) }}</textarea>
                                @error('description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            {{-- <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="pending" {{ old('status', $report->status) == 'pending' ? 'selected'
                                        : '' }}>
                                        Pending</option>
                                    <option value="completed" {{ old('status', $report->status) == 'completed' ?
                                        'selected' : '' }}>
                                        Completed</option>
                                    <option value="approved" {{ old('status', $report->status) == 'approved' ?
                                        'selected' : '' }}>
                                        Approved</option>
                                </select>
                                @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="form-group mb-3">
                                <label for="report_image" class="form-label">Upload Report Images (optional)</label>
                                <input type="file" name="report_images[]" class="form-control" id="report_image"
                                    accept="image/*" multiple onchange="previewImages()">
                                @error('report_images')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror

                                @php
                                $report_images = json_decode($report->report_images, true);
                                @endphp

                                @if (is_array($report_images))
                                <div class="mt-2">
                                    <p>Current Images:</p>
                                    <div class="d-flex justify-content-center">
                                        {{-- @foreach ($report_images as $index => $image)
                                        <div class="m-2 position-relative" style="display: inline-block;">
                                            <img src="{{ asset($image) }}" alt="Current Report Image"
                                                style="height: 100px; width: 100px;">

                                            <button type="button"
                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"
                                                onclick="removeImage('{{ $index }}')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        @endforeach --}}

                                        <div id="existing_images_container" class="d-flex justify-content-center flex-wrap">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="image_preview" class="form-label">Preview New Images</label>
                                <div id="image_preview" class="d-flex justify-content-center">
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center">
                                <button type="submit" class="btn btn-primary">Update Report</button>
                                <a href="{{ url('/loginportal/view-site-reports/' . $site->id) }}"
                                    class="btn btn-danger">Cancel</a>
                            </div>

                            <input type="hidden" name="current_images" id="current_images"
                                value="{{ json_encode($report_images) }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- <script>
    let currentImages = @json($report_images);

        function previewImages() {
            const fileInput = document.getElementById('report_image');
            const previewContainer = document.getElementById('image_preview');

            previewContainer.innerHTML = '';

            if (fileInput.files && fileInput.files.length > 0) {
                Array.from(fileInput.files).forEach(file => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxHeight = '150px';
                        img.style.maxWidth = '150px';
                        img.style.margin = '10px';
                        img.style.border = '1px solid #ccc';
                        img.style.borderRadius = '5px';
                        previewContainer.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                });
            }
        }

        function removeImage(index) {
            currentImages.splice(index, 1);
            document.getElementById('current_images').value = JSON.stringify(currentImages);
            const imageElement = document.querySelectorAll('.m-2')[index];
            if (imageElement) {
                imageElement.style.display = 'none';
            }
        }
</script> --}}

<script>
    let currentImages = @json($report_images); // existing images from DB
    let selectedFiles = []; // newly selected images

    window.onload = function () {
        renderExistingImages();
    };

    function renderExistingImages() {
        const existingContainer = document.getElementById('existing_images_container');
        existingContainer.innerHTML = '';

        currentImages.forEach((image, index) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'm-2 position-relative existing-image';
            wrapper.style.display = 'inline-block';

            const img = document.createElement('img');
            img.src = `{{ asset('') }}` + image; // Laravel-style path
            img.style.height = '100px';
            img.style.width = '100px';
            img.style.border = '1px solid #ccc';
            img.style.borderRadius = '5px';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
            removeBtn.onclick = function () {
                currentImages.splice(index, 1);
                document.getElementById('current_images').value = JSON.stringify(currentImages);
                renderExistingImages();
            };

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            existingContainer.appendChild(wrapper);
        });

        // update hidden input
        document.getElementById('current_images').value = JSON.stringify(currentImages);
    }

    function previewImages() {
        const fileInput = document.getElementById('report_image');
        const previewContainer = document.getElementById('image_preview');
        previewContainer.innerHTML = '';
        selectedFiles = [];

        if (fileInput.files && fileInput.files.length > 0) {
            Array.from(fileInput.files).forEach((file, i) => {
                selectedFiles.push(file);

                const reader = new FileReader();
                reader.onload = function (e) {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'm-2 position-relative';
                    wrapper.style.display = 'inline-block';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxHeight = '100px';
                    img.style.maxWidth = '100px';
                    img.style.border = '1px solid #ccc';
                    img.style.borderRadius = '5px';

                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                    removeBtn.onclick = function () {
                        selectedFiles.splice(i, 1);
                        wrapper.remove();
                        updateFileInput();
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    previewContainer.appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });
        }

        updateFileInput();
    }

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        document.getElementById('report_images').files = dataTransfer.files;
    }
</script>

@endsection
