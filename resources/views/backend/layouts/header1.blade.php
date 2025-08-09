<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') - Alpha Vision</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../backend/img/logo.png" rel="icon">
    <link href="../backend/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="../backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../backend/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../backend/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../backend/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../backend/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../backend/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/admin') }}" class="logo d-flex align-items-center">
                <img src="../backend/img/logo.png" alt="">
                <span class="d-none d-lg-block">Alpha Vision</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset(session('image', 'default-profile-image.jpg')) }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ session('username', 'Guest') }}</span>
                    </a><!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ session('username', 'Guest') }}</h6>
                            <span>{{ session('job', 'Job Title') }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/profile') }}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/admin/logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">Admin Controls</li>

            <!-- User's Admin Menu -->
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#menu-submenu" data-bs-toggle="collapse" href="#" aria-expanded="{{ Request::is('admin*') ? 'true' : 'false' }}">
                    <i class="bi bi-people"></i> <!-- Users icon -->
                    <span>User's Admin</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="menu-submenu" class="nav-content collapse {{ Request::is('admin*') ? 'show' : '' }}">
                    <!-- Removed data-bs-parent -->
                    <li>
                        <a href="{{ url('/admin') }}">
                            <i class="bi bi-house-door" style="font-size: large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/contact') }}">
                            <i class="bi bi-envelope" style="font-size: large"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/quote') }}">
                            <i class="bi bi-chat-left-quote" style="font-size: large"></i>
                            <span>Quote</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Login Portal -->
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#loginportal-submenu" data-bs-toggle="collapse" href="#" aria-expanded="{{ Request::is('loginportal*') ? 'true' : 'false' }}">
                    <i class="bi bi-door-open"></i>
                    <span>LoginPortal</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="loginportal-submenu" class="nav-content collapse {{ Request::is('loginportal*') ? 'show' : '' }}">
                    <li>
                        <a href="{{ url('/loginportaldashbaord') }}">
                            <i class="bi bi-speedometer2" style="font-size: large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Customer Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                            href="#customer-submenu" aria-expanded="false" aria-controls="customer-submenu">
                            <div>
                                <i class="bi bi-people-fill" style="font-size: large"></i>
                                <span>User</span>
                            </div>
                            <i class="bi bi-chevron-down toggle-icon" style="font-size: large"></i>
                        </a>
                        <ul id="customer-submenu" class="nav-content collapse">
                            <li>
                                <a href="{{ url('/loginportal/create-customer') }}">
                                    <i class="bi bi-person-plus-fill" style="font-size: large"></i>
                                    <span>Create User</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/loginportal/customers') }}">
                                    <i class="bi bi-people-fill" style="font-size: large"></i>
                                    <span>View all Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                            href="#sites-submenu" aria-expanded="false" aria-controls="sites-submenu">
                            <div>
                                <i class="bi bi-building" style="font-size: large"></i>
                                <span>Sites</span>
                            </div>
                            <i class="bi bi-chevron-down toggle-icon" style="font-size: large"></i>
                        </a>
                        <ul id="sites-submenu" class="nav-content collapse">
                            <li>
                                <a href="{{ url('/loginportal/create-new-site') }}">
                                    <i class="bi bi-plus-circle-fill" style="font-size: large"></i>
                                    <span>Add New Site</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/loginportal/view-all-sites') }}">
                                    <i class="bi bi-eye-fill" style="font-size: large"></i>
                                    <span>View All Sites</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                            href="#reports-submenu" aria-expanded="false" aria-controls="reports-submenu">
                            <div>
                                <i class="bi bi-file-earmark-bar-graph" style="font-size: large"></i>
                                <span>Reports</span>
                            </div>
                            <i class="bi bi-chevron-down toggle-icon" style="font-size: large"></i>
                        </a>
                        <ul id="reports-submenu" class="nav-content collapse">
                            <li>
                                <a href="{{ url('/loginportal/create-new-report') }}">
                                    <i class="bi bi-plus-square-fill" style="font-size: large"></i>
                                    <span>Create New Report</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/loginportal/view-all-reports') }}">
                                    <i class="bi bi-file-earmark-bar-graph-fill" style="font-size: large"></i>
                                    <span>View All Reports</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
                            href="#notifications-submenu" aria-expanded="false" aria-controls="notifications-submenu">
                            <div>
                                <i class="bi bi-bell" style="font-size: large"></i>
                                <span>Notifications</span>
                            </div>
                            <i class="bi bi-chevron-down toggle-icon" style="font-size: large"></i>
                        </a>
                        <ul id="notifications-submenu" class="nav-content collapse">
                            <li>
                                <a href="{{ url('/loginportal/send-new-notification') }}">
                                    <i class="bi bi-send-fill" style="font-size: large"></i>
                                    <span>Send New Notification</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/loginportal/view-all-notifications') }}">
                                    <i class="bi bi-postcard-fill" style="font-size: large"></i>
                                    <span>View All Notifications</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- Profile -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/profile') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </aside>
