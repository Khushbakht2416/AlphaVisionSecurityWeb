@extends('backend.layouts.main1')
@section('title', 'Create New User')
@section('main-container')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create New User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create New User</li>
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
                            <h5 class="card-title">New User Information</h5>
                            <p>Please fill in the details to add a new user.</p>

                            <!-- User Registration Form -->
                            <form method="POST" action="{{ url('/loginportal/create-new-customer') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Full Name -->
                                <div class="form-group mb-3">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <input type="text" name="full_name" class="form-control" id="full_name" required
                                        value="{{ old('full_name') }}">
                                    @error('full_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Company Name -->
                                <div class="form-group mb-3">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" id="company_name"
                                        value="{{ old('company_name') }}">
                                    @error('company_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone Number -->
                                <div class="form-group mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                                        value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" id="address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 text-center">
                                    <button type="submit" class="btn btn-success">Add User</button>
                                    <a href="{{ url('/loginportal/customers') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
