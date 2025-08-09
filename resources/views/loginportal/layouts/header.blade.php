<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Login Portal</title>
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="apple-touch-icon" sizes="57x57" href="frontend/assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="frontend/assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="frontend/assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="frontend/assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="frontend/assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="frontend/assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="frontend/assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="frontend/assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="frontend/assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="frontend/assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="frontend/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="frontend/assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="frontend/assets/images/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="frontend/assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery/">
    <meta property="og:title" content="Home - Login Portal">
    <meta property="og:type" content="Website">
    <link rel="stylesheet" href="loginportal/assets/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="loginportal/assets/css/custom.css" />
    <link rel="stylesheet" href="loginportal/assets/css/main.min.css" />
    <link rel="stylesheet" href="loginportal/assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class="page-wrapper">
        <div class="main-container">
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="app-brand mb-3">
                    <a href="{{ url('/customerportal') }}">
                        <img src="loginportal/logo.png" class="logo" alt="Axis Bootstrap Template" />
                    </a>
                </div>
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <li class="{{ request()->is('customerportal') ? 'active current-page' : '' }}">
                            <a href="{{ url('/customerportal') }}">
                                <i class="bi bi-laptop"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('customerportal/site*') ? 'active current-page' : '' }}">
                            <a href="{{ url('/customerportal/sites') }}">
                                <i class="bi bi-pin-map"></i>
                                <span class="menu-text">Sites</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('customerportal/report*') ? 'active current-page' : '' }}">
                            <a href="{{ url('/customerportal/reports') }}">
                                <i class="bi bi-bar-chart-line"></i>
                                <span class="menu-text">Reports</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('customerportal/notifications') ? 'active current-page' : '' }}">
                            <a href="{{ url('/customerportal/notifications') }}">
                                <i class="bi bi-bell"></i>
                                <span class="menu-text">Notifications</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('customerportal/profile') ? 'active current-page' : '' }}">
                            <a href="{{ url('/customerportal/profile') }}">
                                <i class="bi bi-person-circle"></i>
                                <span class="menu-text">User Profile</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('customerportal/settings') ? 'active current-page' : '' }}">
                            <a href="{{ url('/customerportal/settings') }}">
                                <i class="bi bi-gear"></i>
                                <span class="menu-text">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-settings gap-1 d-lg-flex d-none">
                    <a href="{{ url('/customerportal/profile') }}" class="settings-icon" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" title="Profile">
                        <i class="bi bi-person"></i>
                    </a>
                    <a href="{{ url('/customerportal/sites') }}" class="settings-icon" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" title=" Sites">
                        <i class="bi bi-pin-map"></i>
                    </a>
                    <a href="{{ url('/customerportal/reports') }}" class="settings-icon" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" title=" Reports">
                        <i class="bi bi-bar-chart-line"></i>
                    </a>
                    <a href="{{ url('/customerportal/settings') }}" class="settings-icon" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" title=" Settings">
                        <i class="bi bi-gear"></i>
                    </a>
                    <a href="{{ url('/customerportal/logout') }}" class="settings-icon" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" title="Logout">
                        <i class="bi bi-power"></i>
                    </a>
                </div>
            </nav>
            <div class="app-container">
                <div class="app-header d-flex align-items-center">
                    <div class="d-flex">
                        <button class="pin-sidebar">
                            <i class="bi bi-list lh-1"></i>
                        </button>
                    </div>
                    <div class="app-brand-sm d-lg-none d-flex">
                        <a href="{{ url('/customerportal') }}">
                            <img src="loginportal/sm-logo.png" class="logo" alt="Axis Bootstrap Template" />
                        </a>
                    </div>
                    <div class="d-flex align-items-center ms-3">
                        <h5 class="m-0">@yield('title')</h5>
                    </div>
                    <div class="header-actions">
                        <div class="dropdown ms-4">
                            <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center" href="#!"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ Session('customer')->profile_image }}" class="rounded-4 img-3x"
                                    alt="Bootstrap Gallery" />
                                <div class="ms-2 text-truncate d-lg-flex flex-column d-none">
                                    <p class="text-truncate m-0">{{ Session('customer')->full_name }}</p>
                                    <span class="small opacity-50 lh-1">User</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                                <a class="dropdown-item d-flex align-items-center"
                                    href="{{ url('/customerportal/profile') }}"><i class="bi bi-person fs-5 me-2"></i>My
                                    Profile</a>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="{{ url('/customerportal/settings') }}"><i
                                        class="bi bi-gear fs-5 me-2"></i>Settings</a>
                                <div class="mx-3 mt-2 d-grid">
                                    <a href="{{ url('/customerportal/logout') }}" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button class="toggle-sidebar">
                                <i class="bi bi-list lh-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
