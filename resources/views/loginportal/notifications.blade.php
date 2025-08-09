@extends('loginportal.layouts.main1')
@section('title', 'Notifications')
@section('main-container')
    <div class="app-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="custom-tabs-container">
                            <div class="container-fluid">
                                <ul class="nav nav-tabs d-flex flex-wrap justify-content-between align-items-center"
                                    id="customNotes" role="tablist">
                                    <div class="d-flex flex-wrap">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA"
                                                role="tab" aria-controls="oneA" aria-selected="true">
                                                <i class="bi bi-clock-history"></i> Hourly
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tab-twoA" data-bs-toggle="tab" href="#twoA"
                                                role="tab" aria-controls="twoA" aria-selected="false">
                                                <i class="bi bi-exclamation-triangle"></i> Incident
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                            <div class="tab-content" id="customTabNotes">
                                <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                    <div class="row gx-4">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="card mb-1">
                                                <div class="activity-feed">
                                                    @if ($notifications->where('notification_type', 'hourly')->isEmpty())
                                                        <p class="text-center">No notifications found.</p>
                                                    @else
                                                        @foreach ($notifications as $notification)
                                                            @if ($notification->notification_type == 'hourly')
                                                                <div class="feed-item">
                                                                    <div class="p-3 rounded-3">
                                                                        <div
                                                                            class="d-flex mb-2 justify-content-between align-items-center">
                                                                            <p class="mb-0 fw-semibold">
                                                                                {{ \Carbon\Carbon::parse($notification->notification_date)->format('l h:i A') }}
                                                                            </p>
                                                                            <button class="btn btn-sm btn-outline-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#notificationModal{{ $notification->id }}">See
                                                                                More</button>
                                                                        </div>
                                                                        <p class="mb-0">
                                                                            {{ Str::limit($notification->message, 150, '...') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="twoA" role="tabpanel">
                                    <div class="row gx-4">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="card mb-1">
                                                <div class="activity-feed">
                                                    @if ($notifications->where('notification_type', 'incident')->isEmpty())
                                                        <p class="text-center">No notifications found.</p>
                                                    @else
                                                        @foreach ($notifications as $notification)
                                                            @if ($notification->notification_type == 'incident')
                                                                <div class="feed-item">
                                                                    <div class="p-3 rounded-3">
                                                                        <div
                                                                            class="d-flex mb-2 justify-content-between align-items-center">
                                                                            <p class="mb-0 fw-semibold">
                                                                                {{ \Carbon\Carbon::parse($notification->notification_date)->format('l h:i A') }}
                                                                            </p>
                                                                            <button class="btn btn-sm btn-outline-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#notificationModal{{ $notification->id }}">See
                                                                                More</button>
                                                                        </div>
                                                                        <p class="mb-0">
                                                                            {{ Str::limit($notification->message, 150, '...') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach ($notifications as $notification)
                                <div class="modal fade" id="notificationModal{{ $notification->id }}" tabindex="-1"
                                    aria-labelledby="notificationModal{{ $notification->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="notificationModal{{ $notification->id }}Label">
                                                    Notification</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label class="form-label text-muted">Notification Type
                                                </label>
                                                <p class="
                                                    mb-2">
                                                    {{ ucfirst($notification->notification_type) }}</p>
                                                <label class="form-label text-muted">Notification Date
                                                </label>
                                                <p class="
                                                    mb-2">
                                                    {{ \Carbon\Carbon::parse($notification->notification_date)->format('l jS \\of F Y h:i A') }}
                                                </p>
                                                <label class="form-label text-muted">Notification
                                                    Message</label>
                                                <p class="
                                                    mb-2">
                                                    {{ $notification->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
