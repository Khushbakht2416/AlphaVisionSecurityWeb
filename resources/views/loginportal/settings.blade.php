@extends('loginportal.layouts.main1')
@section('title', 'Settings')
@section('main-container')
    <div class="app-body">
        <div class="row gx-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="custom-tabs-container">
                            <ul class="nav nav-tabs" id="customTab2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ session('active_tab') != 'password' ? 'active' : '' }}"
                                        href="{{ url()->current() . '?active_tab=details' }}" role="tab"
                                        aria-controls="oneA"
                                        aria-selected="{{ session('active_tab') != 'password' ? 'true' : 'false' }}">
                                        Personal Details
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ session('active_tab') == 'password' ? 'active' : '' }}"
                                        href="{{ url()->current() . '?active_tab=password' }}" role="tab"
                                        aria-controls="fourA"
                                        aria-selected="{{ session('active_tab') == 'password' ? 'true' : 'false' }}">
                                        Reset Password
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content h-300">
                                @if (session('error'))
                                    <p class="text-center text-danger">{{ session('error') }}</p>
                                @endif
                                @if (session('success'))
                                    <p class="text-center text-danger">{{ session('success') }}</p>
                                @endif

                                @php $customer = Session::get('customer'); @endphp

                                <!-- Personal Details Tab -->
                                <div class="tab-pane fade show {{ session('active_tab') != 'password' ? 'active' : '' }}"
                                    id="oneA" role="tabpanel">
                                    <form id="personalDetailsForm" method="POST"
                                        action="{{ url('/customerportal/updateProfileSettings') }}">
                                        @csrf
                                        <input type="hidden" name="original_full_name"
                                            value="{{ $customer->full_name ?? '' }}">
                                        <input type="hidden" name="original_city" value="{{ $customer->city ?? '' }}">
                                        <input type="hidden" name="original_state" value="{{ $customer->state ?? '' }}">
                                        <input type="hidden" name="original_zip_code"
                                            value="{{ $customer->zip_code ?? '' }}">
                                        <input type="hidden" name="original_country"
                                            value="{{ $customer->country ?? '' }}">
                                        <input type="hidden" name="original_address"
                                            value="{{ $customer->address ?? '' }}">

                                        <div class="row gx-3">
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="fullName" class="form-label">Full Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                        <input type="text" class="form-control" id="fullName"
                                                            name="full_name" value="{{ $customer->full_name ?? '' }}"
                                                            placeholder="Full name">
                                                    </div>
                                                    @error('full_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                                        <input type="text" class="form-control" id="phoneNumber"
                                                            name="phone_number" value="{{ $customer->phone_number ?? '' }}"
                                                            placeholder="Phone Number">
                                                    </div>
                                                    @error('phone_number')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="companyName" class="form-label">Company Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-building-check"></i></span>
                                                        <input type="text" class="form-control" id="companyName"
                                                            name="company_name" value="{{ $customer->company_name ?? '' }}"
                                                            placeholder="Company Name">
                                                    </div>
                                                    @error('company_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">City</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                        <input type="text" class="form-control" id="city"
                                                            name="city" value="{{ $customer->city ?? '' }}"
                                                            placeholder="City">
                                                    </div>
                                                    @error('city')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="state" class="form-label">State</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-geo"></i></span>
                                                        <input type="text" class="form-control" id="state"
                                                            name="state" value="{{ $customer->state ?? '' }}"
                                                            placeholder="State">
                                                    </div>
                                                    @error('state')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="zipCode" class="form-label">Zip Code</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-mailbox"></i></span>
                                                        <input type="text" class="form-control" id="zipCode"
                                                            name="zip_code" value="{{ $customer->zip_code ?? '' }}"
                                                            placeholder="Zip Code">
                                                    </div>
                                                    @error('zip_code')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="country" class="form-label">Country</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-flag"></i></span>
                                                        <input type="text" class="form-control" id="country"
                                                            name="country" value="{{ $customer->country ?? '' }}"
                                                            placeholder="Country">
                                                    </div>
                                                    @error('country')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-geo-alt"></i></span>
                                                        <textarea class="form-control" id="address" name="address" rows="1" placeholder="Your Address">{{ $customer->address ?? '' }}</textarea>
                                                    </div>
                                                    @error('address')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade {{ session('active_tab') == 'password' ? 'show active' : '' }}"
                                    id="fourA" role="tabpanel">
                                    <form id="resetPasswordForm" method="POST"
                                        action="{{ url('/customerportal/updateProfilePassword') }}">
                                        @csrf
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-sm-4 col-12">
                                                <div class="card border mb-3">
                                                    <div class="card-body">
                                                        <!-- Current Password Field -->
                                                        <div class="mb-3">
                                                            <label class="form-label" for="currentPwd">Current password
                                                                <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="password" id="currentPwd"
                                                                    name="current_password"
                                                                    placeholder="Enter Current password"
                                                                    class="form-control">
                                                                <button class="btn btn-outline-danger toggle-password"
                                                                    type="button" data-target="currentPwd">
                                                                    <i class="bi bi-eye text-black"></i>
                                                                </button>
                                                            </div>
                                                            @error('current_password')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <!-- New Password Field -->
                                                        <div class="mb-3">
                                                            <label class="form-label" for="newPwd">New password <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="password" id="newPwd" name="new_password"
                                                                    class="form-control"
                                                                    placeholder="Your password must be 8-20 characters long.">
                                                                <button class="btn btn-outline-danger toggle-password"
                                                                    type="button" data-target="newPwd">
                                                                    <i class="bi bi-eye text-black"></i>
                                                                </button>
                                                            </div>
                                                            @error('new_password')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label" for="confNewPwd">Confirm new
                                                                password
                                                                <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="password" id="confNewPwd"
                                                                    name="new_password_confirmation"
                                                                    placeholder="Confirm new password"
                                                                    class="form-control">
                                                                <button class="btn btn-outline-danger toggle-password"
                                                                    type="button" data-target="confNewPwd">
                                                                    <i class="bi bi-eye text-black"></i>
                                                                </button>
                                                            </div>
                                                            @error('new_password_confirmation')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-end">
                            <button type="button" class="btn btn-outline-danger" id="cancelBtn">Reset Form</button>
                            <button type="submit" class="btn btn-danger"
                                form="{{ session('active_tab') == 'password' ? 'resetPasswordForm' : 'personalDetailsForm' }}">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetInput = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (targetInput.type === "password") {
                    targetInput.type = "text";
                    icon.classList.replace("bi-eye", "bi-eye-slash");
                } else {
                    targetInput.type = "password";
                    icon.classList.replace("bi-eye-slash", "bi-eye");
                }
            });
        });
        document.getElementById('cancelBtn').addEventListener('click', function() {
            const activeTab = document.querySelector('.tab-pane.active');
            if (activeTab.id === 'oneA') {
                document.getElementById('personalDetailsForm').reset();
            } else if (activeTab.id === 'fourA') {
                document.getElementById('resetPasswordForm').reset();
            }
        });
    </script>
@endsection
