@extends('frontend.layouts.main')
@section('title', 'Installation')
@section('main-container')
    <!-- BANNER-SECTION -->
    <div class="home-banner-section1 overflow-hidden mt-4">
        <div class="banner-container-box1">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Side: Text -->
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-md-start text-center" data-aos="fade-up">
                        <h3><span class="text-white">PROFESSIONAL SECURITY </span><span
                                class="text-danger">INSTALLATION</span></h3>
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

    <!-- FUN FACT_SECTION -->
    <section class="icons-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                    <br>
                    <p class="text-center p-0" data-aos="fade-zoom-in" style="color: white;">Why Choose <span
                            class="text-danger">Alpha Visions </span>for Installation?</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Circle 1 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-user-shield"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">Certified and Experienced Installers</p>
                </div>

                <!-- Circle 2 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-tools"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">High-Quality Equipment and Cabling</p>
                </div>

                <!-- Circle 3 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-home"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">Seamless Smart Home Integration</p>
                </div>

                <!-- Circle 4 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-bolt"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">Clean, Fast, and Professional Service</p>
                </div>
            </div>


        </div>
    </section>

    <section class="cyber-security-section accordian-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="faq-content-img" data-aos="fade-right">
                        <figure class="mb-0"><img src="frontend/assets/images/accordian-left-img.png" alt=""
                                class="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="cyber-content accordian-text" data-aos="fade-up">
                        <h3>Our Installation Services Include:</h3>
                        <div class="accordian-inner">
                            <!-- Accordion Container -->
                            <div class="accordion" id="accordionExampleServices">
                                <!-- 1 -->
                                <div class="accordion-card">
                                    <div class="" id="headingFour">
                                        <a href="#" class="btn btn-link text-decoration-none"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            <h5 class="faq-btn-text">Alarm System Installation</h5>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                                        data-bs-parent="#accordionExampleServices">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                Expert setup of motion detectors, door/window sensors, sirens, and smart
                                                panels.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="accordion-card">
                                    <div class="" id="headingFive">
                                        <a href="#" class="btn btn-link collapsed text-decoration-none"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                            aria-controls="collapseFive">
                                            <h5 class="faq-btn-text">CCTV Installation</h5>
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                        data-bs-parent="#accordionExampleServices">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                Professional mounting, wiring, and configuration of indoor and outdoor
                                                surveillance cameras with live feed access.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div class="accordion-card">
                                    <div class="" id="headingSix">
                                        <a href="#" class="btn btn-link collapsed text-decoration-none"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                            aria-controls="collapseSix">
                                            <h5 class="faq-btn-text">Smart Technology Integration</h5>
                                        </a>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                        data-bs-parent="#accordionExampleServices">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                Connecting your alarm and CCTV systems to smart devices for remote
                                                monitoring and instant notifications.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- 4 -->
                                <div class="accordion-card">
                                    <div class="" id="headingSeven">
                                        <a href="#" class="btn btn-link collapsed text-decoration-none"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                            aria-expanded="false" aria-controls="collapseSeven">
                                            <h5 class="faq-btn-text">Testing & Quality Assurance</h5>
                                        </a>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                        data-bs-parent="#accordionExampleServices">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                Every device is fully tested to ensure flawless operation before we hand
                                                over control to you.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative w-100 d-flex align-items-center"
        style="min-height: 250px; height: 80vh; background: url('your-image.jpg') no-repeat center center/cover;">
        <!-- Dark Overlay -->
        <div class="position-absolute start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.6);"></div>

        <!-- Centered Content -->
        <div class="container position-relative text-center text-white pt-4">
            <h2 class="fw-bold">
                <span class="text-white">PROFESSIONAL SECURITY SYSTEM</span>
                <span class="text-danger">INSTALLATION</span>
            </h2>
            <div style="display: flex; justify-content: center;">
                <p
                    style="max-width: 800px; text-align: justify; text-justify: inter-word; color: rgba(255, 255, 255, 0.835); font-size: 16px; line-height: 1.6; margin-top: 5px;">
                    A secure home or business begins with expert installation. At Alpha Visions, we specialize in the
                    precise and professional setup of advanced security systems, tailored to meet your unique needs. Our
                    experienced technicians ensure that every component, from cameras to sensors, is perfectly positioned
                    for maximum protection and reliability. We take pride in delivering seamless installations with minimal
                    disruption, backed by thorough testing to guarantee everything operates flawlessly. Trust us to lay the
                    foundation for your security with the latest technology and meticulous attention to detail. With Alpha
                    Visions, your safety starts with expert craftsmanship and care.
                </p>
            </div>
        </div>
    </section>


    <section class="cyber-security-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="cyber-content-img" data-aos="fade-up-left">
                        <figure class="mb-0"><img src="frontend/assets/images/cyber-security-left-img.png"
                                alt="" class="cyber-security-provider-img">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="cyber-content" data-aos="fade-up-right">
                        <h3>PROPER SECURITY INSTALLATION MATTERS</h3>
                        <p class="security-services-p">60% of intruders said they would abandon a property if they spotted
                            a professionally installed system.</p>

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
            <h2 class="fw-bold" style="color: white">SMART SECURITY INSTALLATION</h2>
            <p>Expert Setup of CCTV and Alarm Systems for 24/7 Monitoring</p>
            <a href="{{ url('/contact-us') }}" class="btn btn-light fw-bold px-4 py-2 rounded-pill">Contact Us Now</a>
        </div>
    </section>


    <div style="height: 20px; background-color: rgb(41, 40, 40) "></div>


@endsection
