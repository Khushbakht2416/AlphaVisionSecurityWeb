

@extends('loginportal.layouts.main1')
@section('title', 'Profile')
@section('main-container')

<div class="app-body">
    <form action="{{ url('/customerportal/profile/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center flex-row">
                    <img id="profilePreview" src="{{ '../' . Session('customer')->profile_image }}" class="img-5x rounded-circle" alt="Profile" style="width: 100px; height: 100px; object-fit: cover;" />
                    <div class="ms-3 text-white">
                        <h5 class="mb-1">{{ Session('customer')->full_name }}</h5>
                        <h6 class="m-0 fw-light">User</h6>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                        <input type="file" id="profileInput" name="profile_image" accept="image/*" capture="user" style="display: none;" />
                        <button type="button" id="mainActionBtn" class="btn btn-primary" onclick="triggerImageSelection()">Upload Image</button>
                        <div id="actionButtons" style="display: none;">
                            <button type="button" class="btn btn-dark me-2" onclick="resetImage()">Cancel</button>
                            <button type="submit" class="btn btn-danger">Update Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row gx-4">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div class="icon-box md bg-danger rounded-5 me-3">
                            <i class="bi bi-pin-map fs-4 text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h2>{{ $totalSites }}</h2>
                            <h6>Sites</h6>
                        </div>
                    </div>
                    <div class="m-0">
                        <div class="progress thin mb-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalSites > 0 ? ($activeSites / $totalSites) * 100 : 0 }}%" aria-valuenow="{{ $activeSites }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div class="icon-box md bg-danger rounded-5 me-3">
                            <i class="bi bi-bar-chart-line fs-4 text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h2>{{ $hourlyReportsCount }}</h2>
                            <h6>Hourly Reports</h6>
                        </div>
                    </div>
                    <div class="m-0">
                        <div class="progress thin mb-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalReportsCount > 0 ? ($hourlyReportsCount / $totalReportsCount) * 100 : 0 }}%" aria-valuenow="{{ $hourlyReportsCount }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div class="icon-box md bg-danger rounded-5 me-3">
                            <i class="bi bi-window-sidebar fs-4 text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h2>{{ $incidentReportsCount }}</h2>
                            <h6>Incident Reports</h6>
                        </div>
                    </div>
                    <div class="m-0">
                        <div class="progress thin mb-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalReportsCount > 0 ? ($incidentReportsCount / $totalReportsCount) * 100 : 0 }}%" aria-valuenow="{{ $incidentReportsCount }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-4 card-bg">
                <div class="card-body text-white">
                    <div class="d-flex mb-2">
                        <div class="icon-box md bg-white rounded-5 me-3">
                            <i class="bi bi-bar-chart-line fs-4 text-danger"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h2>{{ $totalReportsCount }}</h2>
                            <h6>Total Reports</h6>
                        </div>
                    </div>
                    <div class="m-0">
                        <div class="progress thin mb-2">
                            <div class="progress-bar bg-white" role="progressbar" style="width: {{ $totalReportsCount > 0 ? ($totalReportsCount / $totalReportsCount) * 100 : 0 }}%" aria-valuenow="{{ $totalReportsCount }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    const profileInput = document.getElementById('profileInput');
    const profilePreview = document.getElementById('profilePreview');
    const mainActionBtn = document.getElementById('mainActionBtn');
    const actionButtons = document.getElementById('actionButtons');
    const originalSrc = profilePreview.src;

    function triggerImageSelection() {
        profileInput.click();
    }

    profileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            profilePreview.src = URL.createObjectURL(file);
            mainActionBtn.style.display = 'none';
            actionButtons.style.display = 'flex';
        }
    });

    function resetImage() {
        profileInput.value = '';
        profilePreview.src = originalSrc;
        mainActionBtn.style.display = 'inline-block';
        actionButtons.style.display = 'none';
    }
</script>

@endsection
