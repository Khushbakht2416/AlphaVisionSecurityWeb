@extends('backend.layouts.main1')
@section('title', 'Admin Profile')
@section('main-container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <center>
            @if ($message = Session::get('success'))
                <div class="alert alert-block p-4 border-left-warning">
                    <strong>
                        <h1 style="color:#354cc1">{{ $message }}</h1>
                    </strong>
                </div>
            @endif
        </center>
        <center>
            @if ($message = Session::get('error'))
                <div class="alert alert-block p-4 border-left-warning">
                    <strong>
                        <h1 style="color:#e10a0a">{{ $message }}</h1>
                    </strong>
                </div>
            @endif
        </center>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset($admin->profile_image) }}" alt="Profile" class="rounded-circle"
                                style="width: 150px; height: 125px;">
                            <h2>{{ $admin->name }}</h2>
                            <h3>{{ $admin->job }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">{{ $admin->about }}</p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Company</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->company }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Job</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->job }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->country }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->address }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->phone }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $admin->email }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">


                                    <form action="{{ url('/admin/update/' . $admin->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="mb-3">
                                                    <img id="previewImage" src="{{ asset($admin->profile_image) }}"
                                                        alt="Profile" style="max-width: 200px;">
                                                </div>
                                                <div class="pt-2">
                                                    <input type="file" class="form-control" id="profileImage"
                                                        name="profileImage" accept="image/*" style="display:none;">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="document.getElementById('profileImage').click();"
                                                        title="Upload new profile image">
                                                        <i class="bi bi-upload"></i> Choose File
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" id="removeImage"
                                                        onclick="removeProfileImage();" style="display:none;"
                                                        title="Remove my profile image">
                                                        <i class="bi bi-trash"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control"
                                                    id="fullName" value="{{ $admin->name }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $admin->about }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="company" type="text" class="form-control" id="company"
                                                    value="{{ $admin->company }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control" id="Job"
                                                    value="{{ $admin->job }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="{{ $admin->country }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="{{ $admin->address }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="{{ $admin->phone }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="{{ $admin->email }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const input = document.getElementById('profileImage');
                                            const preview = document.getElementById('previewImage');
                                            const removeButton = document.getElementById('removeImage');

                                            input.addEventListener('change', function() {
                                                const file = this.files[0];

                                                if (file) {
                                                    const reader = new FileReader();

                                                    reader.addEventListener('load', function() {
                                                        preview.src = reader.result;
                                                        removeButton.style.display = 'inline-block';
                                                    });

                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        });

                                        function removeProfileImage() {
                                            const preview = document.getElementById('previewImage');
                                            const input = document.getElementById('profileImage');
                                            const removeButton = document.getElementById('removeImage');

                                            preview.src = "../{{ $admin->profile_image }}";
                                            input.value = '';
                                            removeButton.style.display = 'none';
                                        }
                                    </script>

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <form method="POST" action="{{ url('/admin/change-credentials/' . $admin->id) }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="currentUsername" class="col-md-4 col-lg-3 col-form-label">Current
                                                Username</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="currentusername" type="text" class="form-control">
                                                @if ($errors->has('currentusername'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('currentusername') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newUsername" class="col-md-4 col-lg-3 col-form-label">New
                                                Username</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newusername" type="text" class="form-control">
                                                @if ($errors->has('newusername'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('newusername') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="currentpassword" type="password" class="form-control">
                                                @if ($errors->has('currentpassword'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('currentpassword') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control">
                                                @if ($errors->has('newpassword'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('newpassword') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control">
                                                @if ($errors->has('renewpassword'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('renewpassword') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Update Credentials</button>
                                        </div>
                                    </form>



                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
