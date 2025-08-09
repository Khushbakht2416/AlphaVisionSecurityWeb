@extends('frontend.layouts.main')
@section('title', 'Alarm Monitoring')
@section('main-container')
    <!-- BANNER-SECTION -->
    <div class="home-banner-section1 overflow-hidden mt-4">
        <div class="banner-container-box1">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Side: Text -->
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-md-start text-center" data-aos="fade-up">
                        <h3><span class="text-white">LIVE</span> <span class="text-danger">Alarm MONITORING</span></h3>
                    </div>
                    <!-- Right Side: Removed Unnecessary Image -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="banner-img-content1 position-relative" data-aos="fade-up">
                            <figure class="banner-img mb-0 wow slideInRight" data-wow-duration="2s">
                                <!-- REMOVED IMG TAG to prevent duplicate image -->
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- text banner --}}
    <section class="container my-5">
        <div class="row align-items-center">
            <!-- Left Box -->
            <div class="col-lg-5 col-md-12">
                <div
                    style="
                position: relative;
                border-radius: 15px;
                overflow: hidden;">
                    <!-- Background Image -->
                    <div
                        style="
                    background: url('frontend/assets/images/alarm-left.webp') no-repeat center center;
                    background-size: cover;
                    filter: blur(2px); /* Blurring effect */
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;">
                    </div>

                    <!-- Content Box -->
                    <div
                        style="
                    position: relative;
                    background: rgba(0, 0, 0, 0.7); /* Dark overlay */
                    padding: 30px;
                    border-radius: 15px;
                    color: white;
                    z-index: 1;">
                        <h4 style="font-weight: bold; color:white; text-align: center;">ABOUT OUR SERVICE</h4>
                        <p style="font-size: 14px; text-align: center;">Your 24-hour guardian for security is Live Alarm
                            Monitoring. Our knowledgeable team guarantees a prompt response to alarms, giving you immediate
                            safety and peace of mind.</p>
                        <hr style="border: 2px solid white; width: 60px; margin: auto;">

                        <ul style="list-style: none; padding: 10px; font-size: 14px; text-align: center;">
                            <li>✔ 24/7 Vigilance</li>
                            <li>✔ Immediate Response</li>
                            <li>✔ Minimized False Alarms</li>
                            <li>✔ Emergency Preparedness</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Text -->
            <div class="col-lg-7 col-md-12 mt-4 mt-lg-0 px-3">
                <h2 class="text-center text-lg-start"
                    style="color: red; font-weight: bold; font-size: 35px; line-height: 1.3;">
                    WHAT IS ALARM MONITORING
                </h2>
                <div style="display: flex; justify-content: center;">
                    <p
                        style="max-width: 800px; text-align: justify; text-justify: inter-word; color: rgb(255, 255, 255); font-size: 16px; line-height: 1.6;">
                        Live alarm monitoring is at the heart of security, providing constant vigilance and rapid response
                        to protect your home and loved ones. Our expert team ensures quick action during alarm activations,
                        minimizing risks and ensuring your peace of mind. We prioritize real alarms, offering prompt
                        responses to various emergencies. With Alpha Visions, your security is our top priority, 24/7.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fun fact_SECTION -->
    <section class="icons-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                    <br>
                    <p class="text-center p-0" data-aos="fade-zoom-in" style="color: white;"> FUN FACT</p>
                    <h4 class="text-center p-0 mb-2" data-aos="fade-zoom-in">
                        <span class="text-white">THE IMPORTANCE OF </span>
                        <span class="text-danger">HOME SECURITY</span>
                    </h4>
                    <div style="display: flex; justify-content: center;">
                        <p
                            style="max-width: 800px; text-align: justify; text-justify: inter-word; color: rgb(255, 255, 255); font-size: 16px; line-height: 1.6; margin-top: 5px;">
                            Taking certain precautions to keep your home safe is imperative. This includes
                            installing an alarm system. While the number of property crimes in the United States—which
                            the Federal Bureau of Investigation (FBI) defines as “offenses of burglary, larceny-theft,
                            motor vehicle theft, and arson”—has decreased throughout the years, they still affect millions
                            of people. Therefore, it’s important to be prepared in case you and your home become a target.
                        </p>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <p class="number-text">700</p>
                        </div>
                    </div>
                    <p class="heading-text">Property Crime Offenses</p>
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <p class="number-text">10</p>
                        </div>
                    </div>
                    <p class="heading-text">Estimated Losses</p>
                </div>
            </div>
            <div style="display: flex; justify-content: center;">
                <p
                    style="max-width: 800px; text-align: justify; text-justify: inter-word; color: rgb(255, 255, 255); font-size: 16px; line-height: 1.6; margin-top: 5px;">
                    Additionally, statistics by market research and consumer data provider Statista report that
                    approximately 35.44 million people in the United States have a security system in their home, as of
                    spring 2017.
                </p>
            </div>
        </div>
    </section>
    <section class="cyber-security-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="cyber-content-img" data-aos="fade-up-left">
                        <figure class="mb-0"><img src="frontend/assets/images/cyber-security-left-img.png" alt=""
                                class="cyber-security-provider-img">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="cyber-content" data-aos="fade-up-right">
                        <h3>IF THERE WAS ANY SIGN OF AN ALARM SYSTEM,</h3>
                        <p class="security-services-p">60 percent said they would abandon their plans and find another
                            target.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="position-relative w-100 d-flex align-items-center"
        style="min-height: 200px; height: 70vh; background: url('frontend/assets/images/alarm-security-banner.png') no-repeat center center/cover;">
        <!-- Dark Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.5);"></div>

        <!-- Centered Content -->
        <div class="container position-relative text-center text-white">
            <h2 class="fw-bold" style="color: white">SMART TECHNOLOGY</h2>
            <p>That Integrates With Alarm Monitoring Systems</p>
            <a href="{{ url('/contact-us') }}" class="btn btn-light fw-bold px-4 py-2 rounded-pill">Contact Us Now</a>
        </div>
    </section>

    <section class="position-relative w-100 d-flex align-items-center"
        style="min-height: 250px; height: 80vh; background: url('your-image.jpg') no-repeat center center/cover;">
        <!-- Dark Overlay -->
        <div class="position-absolute start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.6);"></div>

        <!-- Centered Content -->
        <div class="container position-relative text-center text-white pt-4">
            <h2 class="fw-bold">
                <span class="text-white">LIVE </span>
                <span class="text-danger">ALARM MONITORING</span>
            </h2>
            <div style="display: flex; justify-content: center;">
                <p
                    style="max-width: 800px; text-align: justify; text-justify: inter-word; color: rgba(255, 255, 255, 0.835); font-size: 16px; line-height: 1.6; margin-top: 5px;">
                    The core of security is live alarm monitoring, which offers constant
                    watchfulness and quick action to protect your home and loved ones. Our
                    knowledgeable staff is committed to supplying the finest possible level of
                    security by assiduously watching over your alarms. Our experts react quickly
                    to any alarm activation, reducing potential hazards and guaranteeing your peace
                    We promise prompt security response, ensuring that your safety is never jeopardized,
                    with an emphasis on separating real alarms from fake alerts. We are equipped to manage a variety
                    of security issues, offering you support when you need it most, from break-ins to medical
                    emergencies. With Alpha Visions, we put your security first around the clock.
                </p>
            </div>
        </div>
    </section>
    <div style="height: 20px; background-color: rgb(41, 40, 40) "></div>


@endsection
