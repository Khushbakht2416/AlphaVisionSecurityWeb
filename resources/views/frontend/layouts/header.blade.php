<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Alpha Vision Security</title>
    <link rel="apple-touch-icon" sizes="57x57" href="frontend/assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="frontend/assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="frontend/assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="frontend/assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="frontend/assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="frontend/assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="frontend/assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="frontend/assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="frontend/assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="frontend/assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="frontend/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="frontend/assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="frontend/assets/images/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="frontend/assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="frontend/assets/css/style.css" />
    <link rel="stylesheet" href="frontend/assets/css/mobile.css" />
    <link rel="stylesheet" href="frontend/assets/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="frontend/assets/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="frontend/assets/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="frontend/assets/css/customcss.css" />
    <link href="frontend/assets/unpkg.com/aos%402.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- HEADER-SECTION -->
    <div class="home-header-section">
        <header class="header">
            <div class="main-header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a class="navbar-brand pt-0" href="{{ url('/') }}">
                            <img src="frontend/assets/images/logo.png" alt="" class="img-fluid"
                                style="height: 55px; width: auto;" />
                        </a>
                        <a href="{{ url('/customerportal') }}" class="login-btn d-block d-sm-none ms-auto"
                            style="background-color: white; color: red; padding: 8px 15px; font-size: 12px; font-weight: bold;
                            border-radius: 25px; display: flex; align-items: center; text-decoration: none;
                            transition: all 0.3s ease-in-out; margin-left: auto;">
                            <i class="fas fa-sign-in-alt" style="color: red; font-size: 13px;"></i>
                            <span>Login</span>
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                                    <a class="nav-link text-decoration-none navbar-text-color home-margin-top"
                                        href="{{ url('/') }}">
                                        Home<span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item {{ Request::is('services') || Request::is('live-cctv-monitoring') || Request::is('live-alarm-monitoring') ? 'active' : '' }} dropdown redlight-dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Services</a>
                                    <div class="dropdown-menu dropdown-content-redlight">
                                        <ul class="list-unstyled">
                                            <li class="nav-item"> <a class="dropdown-item nav-link"
                                                    href="{{ url('/services') }}">All Services</a></li>
                                            <li class="nav-item"> <a class="dropdown-item nav-link"
                                                    href="{{ url('/live-cctv-monitoring') }}">CCTV Monitoring</a></li>
                                            <li class="nav-item"> <a class="dropdown-item nav-link"
                                                    href="live-alarm-monitoring">Alarm Monitoring</a></li>
                                            <li class="nav-item"> <a class="dropdown-item nav-link"
                                                    href="{{ url('/installation') }}">Installation</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item {{ Request::is('pricing') ? 'active' : '' }}">
                                    <a class="nav-link text-decoration-none navbar-text-color"
                                        href="{{ url('/pricing') }}">
                                        Pricing
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                                    <a class="nav-link text-decoration-none navbar-text-color"
                                        href="{{ url('/about-us') }}">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::is('contact-us') ? 'active' : '' }}">
                                    <a class="nav-link text-decoration-none navbar-text-color"
                                        href="{{ url('/contact-us') }}">
                                        Contact Us
                                    </a>
                                </li>
                                <div class="header-buttons d-none d-xl-flex"
                                    style="position: absolute; right: 10px; top: 15px; gap: 10px; z-index: 999;">

                                    <a href="tel:02 7229 6438" class="call-btn"
                                        style="background-color: red; color: white; padding: 8px 15px; font-size: 12px; font-weight: bold;
                                        border-radius: 25px; display: flex; align-items: center; gap: 8px; text-decoration: none;
                                         transition: all 0.3s ease-in-out;">
                                        <i class="fas fa-phone" style="color: white; font-size: 13px;"></i>
                                        <span>Call 02 7229 6438</span>
                                    </a>
                                    <a href="{{ url('/customerportal') }}" class="login-btn"
                                        style="background-color: white; color: red; padding: 8px 15px; font-size: 12px; font-weight: bold;
                                        border-radius: 25px; display: flex; align-items: center; gap: 8px; text-decoration: none;
                                        transition: all 0.3s ease-in-out;">
                                        <i class="fas fa-sign-in-alt" style="color: red; font-size: 13px;"></i>
                                        <span>Login</span>
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="chat-bubble-container d-xl-none">
            <div class="chat-bubble-text">
                <img src="/loginportal/sm-logo.png" class="chat-avatar" alt="Support" />
                <div class="chat-bubble">
                    <strong>Need help?</strong><br>
                    Call Us Now!
                </div>
                <button class="close-chat-text ms-2">&times;</button>
            </div>
            <a href="tel:02 7229 6438" class="floating-call-button-custom">
                <i class="fas fa-phone"></i>
            </a>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const chatBubble = document.querySelector('.chat-bubble-text');
                const closeBtn = document.querySelector('.close-chat-text');

                setTimeout(() => {
                    chatBubble.style.opacity = '1';
                }, 2000);

                closeBtn.addEventListener('click', () => {
                    chatBubble.style.display = 'none';
                });
            });
        </script>
