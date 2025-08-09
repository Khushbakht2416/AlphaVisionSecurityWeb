@extends('backend.layouts.main2')
@section('title', 'Send New Notification')
@section('main-container')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Send New Notification</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item">Notifications</li>
                <li class="breadcrumb-item active">Send New Notification</li>
            </ol>
        </nav>
    </div>

    <center>
        @if ($message = Session::get('success'))
            <div class="alert alert-block p-4 border-left-success">
                <strong><h1 style="color:#354cc1">{{ $message }}</h1></strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-block p-4 border-left-warning">
                <strong><h1 style="color:#ff0101">{{ $message }}</h1></strong>
            </div>
        @endif
    </center>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Notification for <strong>{{ $customer->full_name }}</strong></h5>

                        <form method="POST" action="{{ url('/loginportal/send-notification/'. $customer->id) }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Hidden customer ID -->
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                            <!-- Notification Type -->
                            <div class="form-group mb-3">
                                <label for="notification_type" class="form-label">Notification Type</label>
                                <select name="notification_type" class="form-control" id="notification_type" required>
                                    <option value="hourly" {{ old('notification_type') == 'hourly' ? 'selected' : '' }}>Hourly</option>
                                    <option value="incident" {{ old('notification_type') == 'incident' ? 'selected' : '' }}>Incident</option>
                                </select>
                                @error('notification_type')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Notification Message -->
                            <div class="form-group mb-3">
                                <label for="message" class="form-label">Notification Message</label>
                                <textarea name="message" class="form-control" id="message" rows="4">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Notification Date & Time -->
                            <div class="form-group mb-3">
                                <label for="notification_date" class="form-label">Notification Date & Time</label>
                                <input type="datetime-local" name="notification_date" class="form-control" id="notification_date" required value="{{ old('notification_date') }}">
                                @error('notification_date')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <!-- Status -->
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="unread" {{ old('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                                    <option value="read" {{ old('status') == 'read' ? 'selected' : '' }}>Read</option>
                                </select>
                                @error('status')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="form-group mb-3 text-center">
                                <button type="submit" class="btn btn-success">Send Notification</button>
                                <a href="{{ url('/loginportal/view-notifications') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
