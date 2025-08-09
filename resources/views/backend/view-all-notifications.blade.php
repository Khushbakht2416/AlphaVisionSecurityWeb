@extends('backend.layouts.main2')
@section('title', 'All Notifications')
@section('main-container')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>All Notifications</h1>
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
                            <h5 class="card-title">Manage All Notifications</h5>

                            <div class="text-right mb-3">
                                <a href="{{ url('/loginportal/send-new-notification') }}" class="btn btn-primary"
                                    data-bs-toggle="popover" title="Add New Notification"
                                    data-bs-content="Click here to add a new notification.">
                                    <i class="fas fa-plus"></i> Add New Notification
                                </a>
                            </div>

                            <p>Use filters to manage specific notifications.</p>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-1">
                                    <select id="customerFilter" class="form-select">
                                        <option value="">Filter by User</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->full_name }}">{{ $customer->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <select id="notificationTypeFilter" class="form-select">
                                        <option value="">Filter by Notification Type</option>
                                        <option value="hourly">Hourly</option>
                                        <option value="incident">Incident</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <select id="dateFilter" class="form-select">
                                        <option value="">Filter by Date</option>
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="last_week">Last Week</option>
                                        <option value="last_month">Last Month</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                            </div>

                            @if ($notifications->isEmpty())
                                <div class="alert alert-warning text-center">
                                    <h4>No notifications found.</h4>
                                </div>
                            @else
                                <table class="table table-striped text-center" id="notificationsTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Notification Type</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notifications as $notification)
                                            <tr>
                                                <td>{{ $notification->id }}</td>
                                                <td>{{ $notification->customer->full_name ?? 'N/A' }}</td>
                                                <td>{{ ucfirst($notification->notification_type) }}</td>
                                                <td>{{ Str::limit($notification->message, 50) }}</td>
                                                <td>{{ $notification->notification_date }}</td>
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
            const notificationTypeFilter = document.getElementById("notificationTypeFilter");
            const customerFilter = document.getElementById("customerFilter");
            const dateFilter = document.getElementById("dateFilter");
            const rows = document.querySelectorAll("#notificationsTable tbody tr");
            const noResultsMessage = document.getElementById("noResultsMessage");

            function filterTable() {
                const notificationType = notificationTypeFilter.value.toLowerCase();
                const customer = customerFilter.value.toLowerCase();
                const date = dateFilter.value.toLowerCase();
                let visible = 0;

                rows.forEach(row => {
                    const rowText = row.innerText.toLowerCase();
                    const matchesCustomer = !customer || row.cells[1].innerText.toLowerCase().includes(
                        customer);
                    const matchesNotificationType = !notificationType || row.cells[2].innerText
                        .toLowerCase() === notificationType;
                    const matchesDate = filterDate(row, date);

                    if (matchesCustomer && matchesNotificationType && matchesDate) {
                        row.style.display = "";
                        visible++;
                    } else {
                        row.style.display = "none";
                    }
                });

                noResultsMessage.style.display = visible ? "none" : "block";
            }

            function filterDate(row, date) {
                const notificationDate = new Date(row.cells[4].innerText);
                const now = new Date();
                const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
                const yesterday = new Date(today); // Changed from "tomorrow"
                yesterday.setDate(yesterday.getDate() - 1); // Subtract 1 day

                const lastWeek = new Date(today);
                lastWeek.setDate(lastWeek.getDate() - 7);
                const lastMonth = new Date(today);
                lastMonth.setMonth(lastMonth.getMonth() - 1);

                switch (date) {
                    case 'today':
                        return notificationDate.toDateString() === today.toDateString();
                    case 'yesterday':
                        return notificationDate.toDateString() === yesterday.toDateString();
                    case 'last_week':
                        return notificationDate >= lastWeek && notificationDate <= today;
                    case 'last_month':
                        return notificationDate >= lastMonth && notificationDate <= today;
                    case 'all':
                        return true;
                    default:
                        return true;
                }
            }

            notificationTypeFilter.addEventListener("change", filterTable);
            customerFilter.addEventListener("change", filterTable);
            dateFilter.addEventListener("change", filterTable);
        });
    </script>

@endsection
