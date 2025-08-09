@extends('backend.layouts.main2')
@section('title', 'Admin Send Custom SMS')
@section('main-container')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>
             Send Customized SMS
        </h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/loginportal/customers') }}">User</a></li>
                <li class="breadcrumb-item active">Customized SMS</li>
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

    <center>
        @if ($message = Session::get('error'))
        <div class="alert alert-block p-4 border-left-warning">
            <strong>
                <h1 style="color:#e10e0e">{{ $message }}</h1>
            </strong>
        </div>
        @endif
    </center>

    <section class="section">
        <div class="container">
            <div class="row">
                <form action="{{ url('/loginportal/send-custom-sms') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="phone" class="form-label">Recipient Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter recipient phone number" value="{{ $phone }}" disabled>
                        <input type="hidden" name="phone" value="{{ $phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Message</label>
                        <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send SMS</button>
                </form>
            </div>
        </div>
    </section>

</main>

@endsection
