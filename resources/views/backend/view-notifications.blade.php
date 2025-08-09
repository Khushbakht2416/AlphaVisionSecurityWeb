@extends('backend.layouts.main2')
@section('title', 'User Notifications')
@section('main-container')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Notifications for {{ $customer->full_name }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                    <li class="breadcrumb-item active">Notifications</li>
                </ol>
            </nav>
        </div>

        <center>
            @if ($message = Session::get('success'))
                <div class="alert alert-success p-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger p-4">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </center>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Notifications</h5>

                            <div class="text-right mb-3">
                                <a href="{{ url('/loginportal/send-notification/' . $customer->id) }}"
                                    class="btn btn-primary" data-bs-toggle="popover" title="Add New Notification"
                                    data-bs-content="Click here to add a new notification for this user.">
                                    <i class="fas fa-plus"></i> Add New Notification
                                </a>
                            </div>
                            <!-- Filters -->
                            <div class="row mb-4">
                                <div class="col-md-4 mb-2">
                                    <select id="notificationTypeFilter" class="form-select">
                                        <option value="">Filter by Type</option>
                                        <option value="hourly">Hourly</option>
                                        <option value="incident">Incident</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <select id="dateFilter" class="form-select">
                                        <option value="">Filter by Date</option>
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="last_week">Last Week</option>
                                        <option value="last_month">Last Month</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="Search notification message...">
                                </div>
                            </div>


                            @if ($notifications->isEmpty())
                                <div class="alert alert-warning text-center">
                                    <h4>No notifications found for this user.</h4>
                                </div>
                            @else
                                <table class="table table-bordered text-center" id="notificationsTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notifications as $notification)
                                            <tr>
                                                <td>{{ $notification->id }}</td>
                                                <td class="type">{{ ucfirst($notification->notification_type) }}</td>
                                                <td class="message">{{ Str::limit($notification->message, 50) }}</td>
                                                <td class="date">{{ $notification->notification_date }}</td>
                                                <td>
                                                    <a href="{{ url('/loginportal/edit-notification/' . $notification->id) }}"
                                                        class="btn btn-warning" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Edit this notification">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/loginportal/delete-notification/' . $notification->id) }}"
                                                        class="btn btn-danger" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Delete this notification">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            <div id="noResultsMessage" class="alert alert-warning text-center" style="display:none;">
                                <h4>No results found.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl, {
                    trigger: 'hover'
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const typeFilter = document.getElementById("notificationTypeFilter");
            const dateFilter = document.getElementById("dateFilter");
            const searchInput = document.getElementById("searchInput");
            const rows = document.querySelectorAll("#notificationsTable tbody tr");
            const noResultsMessage = document.getElementById("noResultsMessage");

            function filterTable() {
                let visible = 0;
                const typeValue = typeFilter.value.toLowerCase();
                const dateValue = dateFilter.value.toLowerCase();
                const searchText = searchInput.value.toLowerCase();

                const today = new Date();
                today.setHours(0, 0, 0, 0);
                const yesterday = new Date(today);
                yesterday.setDate(today.getDate() - 1);
                const lastWeek = new Date(today);
                lastWeek.setDate(today.getDate() - 7);
                const lastMonth = new Date(today);
                lastMonth.setMonth(today.getMonth() - 1);

                rows.forEach(row => {
                    const type = row.querySelector(".type").innerText.toLowerCase();
                    const message = row.querySelector(".message").innerText.toLowerCase();
                    const dateText = row.querySelector(".date").innerText;
                    const rowDate = new Date(dateText);
                    rowDate.setHours(0, 0, 0, 0);

                    let show = true;

                    if (typeValue && type !== typeValue) show = false;
                    if (searchText && !message.includes(searchText)) show = false;

                    if (dateValue) {
                        switch (dateValue) {
                            case "today":
                                if (rowDate.getTime() !== today.getTime()) show = false;
                                break;
                            case "yesterday":
                                if (rowDate.getTime() !== yesterday.getTime()) show = false;
                                break;
                            case "last_week":
                                if (!(rowDate >= lastWeek && rowDate <= today)) show = false;
                                break;
                            case "last_month":
                                if (!(rowDate >= lastMonth && rowDate <= today)) show = false;
                                break;
                            case "all":
                                break;
                            default:
                                break;
                        }
                    }

                    if (show) {
                        row.style.display = "";
                        visible++;
                    } else {
                        row.style.display = "none";
                    }
                });

                noResultsMessage.style.display = visible === 0 ? "block" : "none";
            }

            typeFilter.addEventListener("change", filterTable);
            dateFilter.addEventListener("change", filterTable);
            searchInput.addEventListener("keyup", filterTable);
        });
    </script>

@endsection
