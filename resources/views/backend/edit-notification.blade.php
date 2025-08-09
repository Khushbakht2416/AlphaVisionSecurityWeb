@extends('backend.layouts.main2')
@section('title', 'Edit Notification')
@section('main-container')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Notification</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                <li class="breadcrumb-item">Notifications</li>
                <li class="breadcrumb-item active">Edit Notification</li>
            </ol>
        </nav>
    </div>

    <center>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">{{ $message }}</div>
        @endif
    </center>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Notification</h5>
                        <form method="POST" action="{{ url('/loginportal/update-notification/' . $notification->id) }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="customer_id" class="form-label">Select User</label>
                                <select name="customer_id" class="form-control" required>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $notification->customer_id == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="notification_type" class="form-label">Notification Type</label>
                                <select name="notification_type" class="form-control" required>
                                    <option value="hourly" {{ $notification->notification_type == 'hourly' ? 'selected' : '' }}>Hourly</option>
                                    <option value="incident" {{ $notification->notification_type == 'incident' ? 'selected' : '' }}>Incident</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="message" class="form-label">Notification Message</label>
                                <textarea name="message" class="form-control" rows="4">{{ $notification->message }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="notification_date" class="form-label">Notification Date & Time</label>
                                <input type="datetime-local" name="notification_date" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($notification->notification_date)->format('Y-m-d\TH:i') }}">
                            </div>

                            {{-- <div class="form-group mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="unread" {{ $notification->status == 'unread' ? 'selected' : '' }}>Unread</option>
                                    <option value="read" {{ $notification->status == 'read' ? 'selected' : '' }}>Read</option>
                                </select>
                            </div> --}}

                            <div class="form-group mb-3 text-center">
                                <button type="submit" class="btn btn-primary">Update Notification</button>
                                <a href="{{ url('/loginportal/view-notifications') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
