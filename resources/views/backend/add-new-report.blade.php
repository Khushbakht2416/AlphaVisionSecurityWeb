@extends('backend.layouts.main2')
@section('title', 'Add New Report')
@section('main-container')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add New Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item">Reports</li>
                <li class="breadcrumb-item active">Add New Report</li>
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
                        <h5 class="card-title">New Report Information</h5>
                        <p>Select a site and enter the report details below.</p>
                        <form method="POST" action="{{ url('/loginportal/create-new-report') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="site_id" class="form-label">Select Site</label>
                                <select name="site_id" class="form-control" id="site_id" required>
                                    <option value="">-- Choose Site --</option>
                                    @foreach ($sites as $site)
                                    <option value="{{ $site->id }}" {{ old('site_id')==$site->id ? 'selected' : '' }}>
                                        {{ $site->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('site_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="report_date" class="form-label">Report Date</label>
                                <input type="datetime-local" name="report_date" class="form-control" id="report_date"
                                    required value="{{ old('report_date') }}">
                                @error('report_date')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="report_type" class="form-label">Report Type</label>
                                <select name="report_type" class="form-control" id="report_type" required>
                                    <option value="hourly" {{ old('report_type')=='hourly' ? 'selected' : '' }}>General
                                    </option>
                                    <option value="incident" {{ old('report_type')=='incident' ? 'selected' : '' }} >
                                        Incident</option>
                                </select>
                                @error('report_type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Report Description</label>
                                <textarea name="description" class="form-control" id="description"
                                    rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="pending" {{ old('status')=='pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="completed" {{ old('status')=='completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="approved" {{ old('status')=='approved' ? 'selected' : '' }}>Approved
                                    </option>
                                </select>
                                @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="form-group mb-3">
                                <label for="report_images" class="form-label">Upload Report Images</label>
                                <input type="file" name="report_images[]" class="form-control" id="report_images"
                                    accept="image/*" multiple>
                                @error('report_images')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="form-group mb-3" id="image_preview_container">
                                <label for="image_preview" class="form-label">Image Previews</label>
                                <div id="image_preview" class="d-flex flex-wrap">
                                </div>
                            </div> --}}
                            <div class="form-group mb-3" id="image_preview_container">
                                <label class="form-label">Image Previews</label>
                                <div id="image_preview" class="d-flex flex-wrap"></div>
                            </div>


                            <div class="form-group mb-3 text-center">
                                <button type="submit" class="btn btn-success">Add Report</button>
                                <a href="{{ url('/loginportal/view-reports') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

{{-- <script>
    document.getElementById('report_images').addEventListener('change', function (e) {
        var files = e.target.files;
        var preview = document.getElementById('image-preview');
        preview.innerHTML = '';

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function (event) {
                var imgElement = document.createElement('img');
                imgElement.src = event.target.result;
                imgElement.style.width = '100px';
                imgElement.style.margin = '10px';
                preview.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    });
</script> --}}
<script>
    let selectedFiles = [];

    document.getElementById('report_images').addEventListener('change', function (e) {
        const fileInput = e.target;
        const previewContainer = document.getElementById('image_preview');
        previewContainer.innerHTML = '';
        selectedFiles = [];

        if (fileInput.files && fileInput.files.length > 0) {
            Array.from(fileInput.files).forEach((file, index) => {
                selectedFiles.push(file);

                const reader = new FileReader();
                reader.onload = function (event) {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'm-2 position-relative';
                    wrapper.style.display = 'inline-block';

                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.style.maxHeight = '100px';
                    img.style.maxWidth = '100px';
                    img.style.border = '1px solid #ccc';
                    img.style.borderRadius = '5px';

                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                    removeBtn.onclick = function () {
                        selectedFiles.splice(index, 1);
                        wrapper.remove();
                        updateFileInput();
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    previewContainer.appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });

            updateFileInput();
        }
    });

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        document.getElementById('report_images').files = dataTransfer.files;
    }
</script>

@endsection
