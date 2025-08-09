@extends('backend.layouts.main')
@section('title', 'Admin Dashboard')
@section('main-container')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                <!-- Menu -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ url('/admin/contact') }}" class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Contact</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-envelope"></i> <!-- Changed icon -->
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $contact->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Best Selling Menu -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ url('/admin/quote') }}" class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Quote</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-chat-left-quote"></i> <!-- Changed icon -->
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $quote->count() }}</h6>
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
