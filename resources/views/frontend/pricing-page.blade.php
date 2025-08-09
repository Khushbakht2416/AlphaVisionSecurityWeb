@extends('frontend.layouts.main')
@section('title', 'Pricing')
@section('main-container')
        <!-- BANNER-SECTION -->
        <div class="home-banner-section3 overflow-hidden mt-4">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Left Side: Text -->
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-md-start text-center">
                            <h3><span class="text-white">OUR</span> <span class="text-danger">PRICING</span></h3>
                            <p>Resonable Price Plan</p>
                        </div>
                        <!-- Right Side: Removed Unnecessary Image -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="banner-img-content position-relative" data-aos="fade-up">
                                <figure class="banner-img mb-0 wow slideInRight" data-wow-duration="2s">
                                    <!-- REMOVED IMG TAG to prevent duplicate image -->
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- White Full-Width Section with Proper Spacing -->
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <!-- Heading Section -->
            <div class="text-center mb-4">
                <h4 class="fw-bold">
                    <span class="text-danger">OUR SIMPLE PRICING </span>
                    <span class="text-dark">THAT SIMPLIFIES YOUR BUSINESS NEEDS</span>
                </h4>
                <p class="text-muted mt-3 px-md-5" style="font-size: medium; text-align: justify;">
                    For your specific security needs, Alpha Vision Security believes in clear and adaptable pricing.
                    Our pricing policies are designed to provide affordable security solutions without compromising
                    quality.
                    Whether you're a homeowner, a small business, or an enterprise, we offer pricing options to fit your
                    needs and budget.
                    Contact us for a customized quote tailored to your requirements.
                </p>
            </div>

            <!-- Features & Button Row -->
            <div class="row align-items-start px-md-5">
                <!-- Bullet Points (Left) -->
                <div class="col-md-6 ps-md-6">
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <span class="bullet-icon">✔</span>
                            <span class="bullet-text">Free 1-month trial for new users</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="bullet-icon">✔</span>
                            <span class="bullet-text">Cancel anytime you want</span>
                        </li>
                    </ul>
                </div>

                <!-- Button (Right on Laptop, Center on Mobile) -->
                <div class="col-md-6 d-flex justify-content-center justify-content-md-end pe-md-6">
                    <a href="{{ url('/contact-us') }}" class="btn btn-danger px-5 py-3 shadow-lg fw-bold rounded-3 custom-rounded-btn">
                        Get in Touch
                    </a>
                </div>
                

            </div>
        </div>
    </div>

    <!-- Get a quote banner -->
    <div class="home-banner-section2 overflow-hidden no-top-space " style="min-height: 60vh; ">
        <div class="banner-container-box">
            <div class="container">
                <div class="row align-items-center">
                    <div
                        class="col-lg-6 col-md-6 col-sm-12 order-lg-2 order-1 mb-md-0 mb-4 text-md-center text-center">
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
    <div style="height: 20px; background-color: rgb(38, 37, 37) "></div>
@endsection
