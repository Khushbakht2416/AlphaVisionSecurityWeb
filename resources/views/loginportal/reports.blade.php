@extends('loginportal.layouts.main1')
@section('title', 'Reports')
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
                                            <a class="nav-link active" id="tab-hourly" data-bs-toggle="tab" href="#hourly"
                                                role="tab" aria-controls="hourly" aria-selected="true">
                                                <i class="bi bi-bar-chart-line"></i> General
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tab-incident" data-bs-toggle="tab" href="#incident"
                                                role="tab" aria-controls="incident" aria-selected="false">
                                                <i class="bi bi-window-sidebar"></i> Incident
                                            </a>
                                        </li>
                                    </div>
                                    <li class="nav-item ms-auto me-3 mt-2 mt-md-0">
                                        <form action="{{ url('/customerportal/reports') }}" method="GET">
                                            <div class="dropdown">
                                                <button class="btn btn-danger dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Select Site
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <button type="submit" name="site" value="all"
                                                            class="dropdown-item">All Sites</button>
                                                    </li>
                                                    @foreach ($sites as $site)
                                                        <li>
                                                            <button type="submit" name="site"
                                                                value="{{ $site->token }}"
                                                                class="dropdown-item">{{ $site->name }}</button>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="customTabNotes">
                                <div class="tab-pane fade show active" id="hourly" role="tabpanel">
                                    <div class="row gx-4" id="hourly-reports">
                                        @if ($reportsHourly->isEmpty())
                                            <div class="col-12">
                                                <p class="text-center">No General reports found for this site.</p>
                                            </div>
                                        @else
                                            @foreach ($reportsHourly as $report)
                                                <div class="col-xl-12 col-sm-12">
                                                    <div class="card mb-1">
                                                        <div class="activity-feed">
                                                            <div class="feed-item">
                                                                <div class="p-3 rounded-3">
                                                                    <div
                                                                        class="d-flex mb-2 justify-content-between align-items-center">
                                                                        <p class="mb-0 fw-semibold">
                                                                            {{ \Carbon\Carbon::parse($report->report_date)->format('l
                                                                                                                                                                                                                        jS \\of F Y h:i A') }}
                                                                        </p>
                                                                        <button class="btn btn-sm btn-outline-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#reportModal{{ $report->id }}">See
                                                                            More</button>
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        {{ Str::limit($report->description, 150, '...') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="incident" role="tabpanel">
                                    <div class="row gx-4" id="incident-reports">
                                        @if ($reportsIncident->isEmpty())
                                            <div class="col-12">
                                                <p class="text-center">No incident reports found for this site.</p>
                                            </div>
                                        @else
                                            @foreach ($reportsIncident as $report)
                                                <div class="col-xl-12 col-sm-12">
                                                    <div class="card mb-1">
                                                        <div class="activity-feed">
                                                            <div class="feed-item">
                                                                <div class="p-3 rounded-3">
                                                                    <div
                                                                        class="d-flex mb-2 justify-content-between align-items-center">
                                                                        <p class="mb-0 fw-semibold">
                                                                            {{ \Carbon\Carbon::parse($report->report_date)->format('l
                                                                                                                                                                                                                        jS \\of F Y h:i A') }}
                                                                        </p>
                                                                        <button class="btn btn-sm btn-outline-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#reportModal{{ $report->id }}">See
                                                                            More</button>
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        {{ Str::limit($report->description, 150, '...') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>


                            @foreach ([$reportsHourly, $reportsIncident] as $reportList)
                                @foreach ($reportList as $report)
                                    <div class="modal fade" id="reportModal{{ $report->id }}" tabindex="-1"
                                        aria-labelledby="reportModal{{ $report->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reportModal{{ $report->id }}Label">Report
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label text-muted">Date & Time</label>
                                                    <p class="mb-2">
                                                        {{ \Carbon\Carbon::parse($report->report_date)->format('l jS \\of F Y h:i A') }}
                                                    </p>

                                                    <label class="form-label text-muted">Description</label>
                                                    <p>{{ $report->description }}</p>

                                                    <label class="form-label text-muted">Images</label>
                                                    <div class="row gx-4">
                                                        @php
                                                            $images = json_decode($report->report_images, true);
                                                        @endphp
                                                        {{-- if images is null then no Images else showing images in foreach --}}
                                                        @if (is_null($images))
                                                            <div class="col-12">
                                                                <p class="text-center">No images available.</p>
                                                            </div>
                                                        @endif
                                                        @if (empty($images))
                                                            <div class="col-12">
                                                                <p class="text-center">No images available.</p>
                                                            </div>
                                                        @endif
                                                        @if (!is_null($images))
                                                            @foreach ($images as $image)
                                                                <div class="d-flex justify-content-center"
                                                                    style="flex: 1; padding: 5px;">
                                                                    <img src="{{ asset($image) }}"
                                                                        onclick="openImageViewer(this)"
                                                                        class="img-fluid rounded cursor-pointer"
                                                                        style="width: 250px; height: 250px;"
                                                                        alt="Report Image">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                            <div class="modal fade" id="imageViewerModal" tabindex="-1" aria-hidden="true" style="z-index: 9999999999;">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-dark text-center">
                                        <div class="modal-header border-0">
                                            <button type="button" class="btn-close btn-close-white ms-auto"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img id="viewerImage" src="" class="img-fluid rounded"
                                                alt="Full Image View">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function openImageViewer(imgElement) {
                                    const viewerImage = document.getElementById('viewerImage');
                                    viewerImage.src = imgElement.src;
                                    const modal = document.getElementById('imageViewerModal');

                                    modal.querySelector('.modal-dialog').style.maxWidth = imgElement.naturalWidth + 'px';
                                    modal.querySelector('.modal-dialog').style.maxHeight = imgElement.naturalHeight + 'px';

                                    const imageViewerModal = new bootstrap.Modal(modal);
                                    imageViewerModal.show();
                                }
                            </script>
                            <style>
                                .cursor-pointer {
                                    cursor: pointer;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
