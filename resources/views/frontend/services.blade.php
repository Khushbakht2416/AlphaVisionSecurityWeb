@extends('frontend.layouts.main')
@section('title', 'Services')
@section('main-container')
    <!-- BANNER-SECTION -->
    <div class="home-banner-section overflow-hidden">
        <div class="banner-container-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                        <div class="about-banner-text" data-aos="fade-up">
                            <h1 class="text-white about-h1">Our Services</h1>
                            <div class="about-btn">
                                <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                                <span class="about-text-color"> / </span>
                                <a href="{{ url('/services') }}" class="text-decoration-none">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <section class="icons-section overflow-hidden">
        <div class="container">
            <div class="row">

            </div>
            <!-- Gradient Circles Section (Placed below header) -->
            <div class="row justify-content-center">
                <!-- Circle 1 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <a href="{{ url('/live-cctv-monitoring') }}" style="text-decoration: none; color: inherit;">
                        <div class="gradient-border" data-aos="flip-left">
                            <div class="inner-circle">
                                <i class="fas fa-desktop"></i>
                            </div>
                        </div>
                        <p class="heading-text">Live CCTV Monitoring</p>
                    </a>
                </div>

                <!-- Circle 2 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <a href="{{ url('/live-alarm-monitoring') }}" style="text-decoration: none; color: inherit;">
                        <div class="gradient-border" data-aos="flip-left">
                            <div class="inner-circle">
                                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"
                                        width="50px" height="50px">
                                        <path
                                            d="M12 2a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V3a1 1 0 0 1 1-1Zm7.07 3.93a1 1 0 0 1 0 1.41l-2.12 2.12a1 1 0 0 1-1.41-1.41l2.12-2.12a1 1 0 0 1 1.41 0ZM4.93 5.07a1 1 0 0 1 1.41 0l2.12 2.12a1 1 0 0 1-1.41 1.41L4.93 6.49a1 1 0 0 1 0-1.41ZM12 8a5 5 0 0 1 5 5v4h2a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2h2v-4a5 5 0 0 1 5-5Zm3 5a3 3 0 0 0-6 0v4h6v-4ZM7 21a1 1 0 1 1 0-2h10a1 1 0 1 1 0 2H7Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="heading-text">Live Alarm Monitoring</p>
                    </a>
                </div>

                <!-- Circle 3-->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <a href="{{ url('/installation') }}" style="text-decoration: none; color: inherit;">
                        <div class="gradient-border" data-aos="flip-left">
                            <div class="inner-circle">
                                <i class="fas fa-tools"></i>
                            </div>
                        </div>
                        <p class="heading-text">Installation</p>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- CYBER-SECURITY-SOLUTION -->
    <section class="cyber-security-section cyber-security-section2 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="cyber-content" data-aos="fade-up-left">
                        <h3>OUR <span class="cyber-text">BEST SERVICES</span></h3>
                        <p class="security-services-p">Explore the services offered by Alpha Visions,
                            where innovation and excellence collide. This section provides
                            details about the variety of solutions we offer,
                            which are intended to improve your security, simplify
                            operations, and give you peace of mind. Learn about
                            the guiding principles of our services, how they can
                            change your security environment, and why Alpha Visions
                            is your go-to partner for safety. Our goal is to ensure your safety,
                            and this section will show you how we go about doing so.</p>
                    </div>

                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 text-md-right text-center">
                    <div class="cyber-content-img-right" data-aos="fade-up-right">
                        <figure class="mb-0"><img src="frontend/assets/images/cyber-security-right-img.png" alt=""
                                class="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services-About-us-Section -->
    <section class="about-us-section-start about-us-section-2 Services-About-us-Section overflow-hidden">
        <div class="about-right-icon position-relative">
            <figure class="about2-left-img"><img src="frontend/assets/images/about-section2-left-img.png" alt=""
                    class="img-fluid">
            </figure>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12" onclick="window.location.href='{{ url('/live-cctv-monitoring') }}'"
                    style="cursor: pointer;">
                    <div class="about-us-content about-margin-bottom" data-aos="fade-up">
                        <div class="icons-rounded-box">
                            <figure class="mb-0"><img src="frontend/assets/images/about-section2-icon1.png"
                                    alt=""></figure>
                        </div>
                        <h4>Live CCTV Monitoring</h4>
                        <div class="notshowinmob">
                            <p class="security-services-p">With the help of our Live CCTV service, you can keep an eye on
                                and
                                safeguard your possessions, loved ones, and property in real-time from any location. You can
                                stay connected and protected day or night through high-definition cameras and 24-hour
                                access.
                            </p>
                            <a href="{{ url('/live-cctv-monitoring') }}" class="text-decoration-none">Read More <span
                                    class="forword-arrow"><i class="fa fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"
                    onclick="window.location.href='{{ url('/live-alarm-monitoring') }}'" style="cursor: pointer;">
                    <div class="about-us-content about-margin-bottom" data-aos="fade-up">
                        <div class="icons-rounded-box">
                            <figure class="mb-0 icon-color"><img src="frontend/assets/images/about-section2-icon2.png"
                                    alt=""></figure>
                        </div>
                        <h4>Live Alarm Monitoring</h4>

                        <div class="notshowinmob">
                            <p class="security-services-p">Our Live Alarm Monitoring service continuously keeps a close eye
                                on your property. When alarms go off, our knowledgeable team reacts right away to provide
                                quick
                                and trustworthy protection. You may relax knowing that Alpha Visions is handling your
                                security
                                with skill.</p>
                            <a href="{{ url('/live-alarm-monitoring') }}" class="text-decoration-none">Read More <span
                                    class="forword-arrow"><i class="fa fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 w-100">
                    <div class="about-us-content about-margin-bottom" data-aos="fade-up">
                        <div class="icons-rounded-box">
                            <figure class="mb-0"><img src="frontend/assets/images/about-section2-icon3.png"
                                    alt="">
                            </figure>
                        </div>
                        <h4>Installation</h4>
                        <div class="notshowinmob">
                            <p class="security-services-p">Our professional security installation service gives you full
                                control over your home or business security. With advanced alarm and CCTV systems, you can
                                monitor live feeds, manage alerts, and ensure complete protection. Stay secure with Alpha
                                Visions.</p>
                            <a href="{{ url('/installation') }}" class="text-decoration-none">Read More <span
                                    class="forword-arrow"><i class="fa fa-angle-right"></i></span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Get a quote banner -->
    <div class="home-banner-section2 overflow-hidden no-top-space " style="min-height: 60vh; ">
        <div class="banner-container-box">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 order-lg-2 order-1 mb-md-0 mb-4 text-md-center text-center">
                        <h3><span class="text-white">GET IN </span><span class="text-danger">TOUCH</span></h3>
                        <h5 style="color: azure; font-size: medium;">Your Road to Improved Security Starts Here</h5>
                        <p style="font-size: medium;">We are a trustworthy partner in securing your most important
                            assets, not just a security provider.</p>
                        <div class="text-start">
                            <a href="{{ url('/contact-us') }}" class="btn custom-btn">Contact Us Now</a>
                        </div>

                        <br>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="banner-img-content position-relative" data-aos="fade-up">
                            <figure class="banner-img mb-0 wow slideInRight" data-wow-duration="2s">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 20px; background-color: rgb(41, 40, 40) "></div>

@endsection
