@extends('backend.layouts.main1')
@section('title', 'Admin Users')
@section('main-container')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/loginportaldashbaord') }}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
            <!-- Send Credential Modal -->
            <div class="modal fade" id="sendCredentialModal" tabindex="-1" aria-labelledby="sendCredentialModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="{{ url('/loginportal/send-credentials') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id_input" value="">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sendCredentialModalLabel">Send Credentials</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p>Please choose how you'd like to send the credentials:</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="method" id="emailOption"
                                        value="email" checked>
                                    <label class="form-check-label" for="emailOption">Send via Email</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="method" id="smsOption"
                                        value="sms">
                                    <label class="form-check-label" for="smsOption">Send via SMS</label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Send</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (session('blocked_user_id'))
                <div class="modal fade" id="notifyBlockedModal" tabindex="-1" aria-labelledby="notifyBlockedModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-danger">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Notify User About Block</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p>Do you want to notify <strong>{{ session('blocked_user_name') }}</strong> about being
                                    <span class="text-danger fw-bold">blocked</span>?
                                </p>
                                <a href="{{ url('/loginportal/send-blocked-status-sms/' . session('blocked_user_id')) }}"
                                    class="btn btn-danger m-1">Notify via SMS</a>
                                <a href="{{ url('/loginportal/send-blocked-status-email/' . session('blocked_user_id')) }}"
                                    class="btn btn-secondary m-1">Notify via Email</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('unblocked_user_id'))
                <div class="modal fade" id="notifyUnblockedModal" tabindex="-1" aria-labelledby="notifyUnblockedModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-success">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">Notify User About Unblock</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p>Do you want to notify <strong>{{ session('unblocked_user_name') }}</strong> about being
                                    <span class="text-success fw-bold">unblocked</span>?</p>
                                <a href="{{ url('/loginportal/send-blocked-status-sms/' . session('unblocked_user_id')) }}"
                                    class="btn btn-success m-1">Notify via SMS</a>
                                <a href="{{ url('/loginportal/send-blocked-status-email/' . session('unblocked_user_id')) }}"
                                    class="btn btn-secondary m-1">Notify via Email</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p>Manage your users efficiently!</p>

                            <div class="text-right mb-3">
                                <a href="{{ url('/loginportal/create-customer') }}" class="btn btn-primary">
                                    <i class="fas fa-user-plus"></i> Add New User
                                </a>
                            </div>

                            @if ($customer->isEmpty())
                                <div class="alert alert-warning text-center">
                                    <h4>No Users found.</h4>
                                </div>
                            @else
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="Search Users...">
                                </div>

                                <table class="table table-striped text-center" id="customerTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Block Status</th>
                                            <th>Notifications</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>
                                                    <img src="{{ '../' . $row->profile_image }}" alt="Profile Image"
                                                        class="rounded-circle" width="45" height="45">
                                                </td>
                                                <td>{{ $row->full_name }}</td>
                                                <td>{{ $row->phone_number ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($row->is_active !== 1)
                                                        <a href="{{ url('/loginportal/toggle-customer-status/' . $row->id) }}"
                                                            class="btn btn-success" data-bs-toggle="popover"
                                                            data-bs-placement="top" data-bs-content="Unblock this user">
                                                            <i class="fas fa-toggle-on"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ url('/loginportal/toggle-customer-status/' . $row->id) }}"
                                                            class="btn btn-warning" data-bs-toggle="popover"
                                                            data-bs-placement="top" data-bs-content="Block this user">
                                                            <i class="fas fa-toggle-off"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-info send-credential-btn"
                                                        data-bs-target="#sendCredentialModal"
                                                        data-user-id="{{ $row->id }}" data-bs-placement="top"
                                                        data-bs-content="Send Credential">
                                                        <i class="fas fa-envelope"></i>
                                                    </button>


                                                    <a href="{{ url('/loginportal/send-custom-sms/' . $row->id) }}"
                                                        class="btn btn-success" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Send Custom SMS">
                                                        <i class="fas fa-sms"></i>
                                                    </a>
                                                    <a href="{{ url('/loginportal/send-custom-email/' . $row->id) }}"
                                                        class="btn btn-secondary" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Send Custom Email">
                                                        <i class="fas fa-paper-plane"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('/loginportal/view-notifications/' . $row->id) }}"
                                                        class="btn btn-warning" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Manage Notifications">
                                                        <i class="fas fa-bell"></i>
                                                    </a>
                                                    <a href="{{ url('/loginportal/view-sites/' . $row->id) }}"
                                                        class="btn btn-info" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="View Sites">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ url('/loginportal/delete-customer/' . $row->id) }}"
                                                        class="btn btn-danger" data-bs-toggle="popover"
                                                        data-bs-placement="top" data-bs-content="Delete User">
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
            document.querySelectorAll('.send-credential-btn').forEach(function(el) {
                new bootstrap.Popover(el, {
                    trigger: 'hover',
                    placement: el.getAttribute('data-bs-placement') || 'top',
                    content: el.getAttribute('data-bs-content') || ''
                });

                el.addEventListener('click', function() {
                    const userId = el.getAttribute('data-user-id');
                    const modal = new bootstrap.Modal(document.getElementById(
                        'sendCredentialModal'));
                    document.getElementById('user_id_input').value = userId;
                    modal.show();
                });
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl, {
                    trigger: 'hover'
                });
            });
        });


        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#customerTable tbody tr");
            let noResultsMessage = document.getElementById("noResultsMessage");
            let visibleRows = 0;

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                    visibleRows++;
                } else {
                    row.style.display = "none";
                }
            });

            if (visibleRows === 0) {
                noResultsMessage.style.display = "block";
            } else {
                noResultsMessage.style.display = "none";
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('blocked_user_id'))
                new bootstrap.Modal(document.getElementById('notifyBlockedModal')).show();
            @endif

            @if(session('unblocked_user_id'))
                new bootstrap.Modal(document.getElementById('notifyUnblockedModal')).show();
            @endif
        });
    </script>

@endsection
