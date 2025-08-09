@extends('backend.layouts.main')
@section('title', 'Login Portal Dashboard')
@section('main-container')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Login Portal Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item active">Login Portal</li>
            </ol>
        </nav>
    </div>

    <center>
        @if ($message = Session::get('success'))
        <div class="alert alert-block p-4 border-left-warning">
            <strong>
                <h1 style="color:#354cc1">{{ $message }}</h1>
            </strong>
        </div>
        @endif
    </center>

    <section class="section dashboard">
        <div class="col-lg-12">
            <div class="row">
                <!-- Customers -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ url('/loginportal/customers') }}" class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-bounding-box"></i> <!-- Changed icon for Customers -->
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $customer->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Sites -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ url('/loginportal/view-all-sites') }}" class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Sites</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-house-door"></i> <!-- Changed icon for Sites -->
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $sites->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Reports -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ url('/loginportal/view-all-reports') }}" class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Reports</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-earmark-bar-graph"></i> <!-- Changed icon for Reports -->
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $reports->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Notifications -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ url('/loginportal/view-all-notifications') }}" class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Notifications</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bell"></i> <!-- Changed icon for Notifications -->
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $notifications->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
