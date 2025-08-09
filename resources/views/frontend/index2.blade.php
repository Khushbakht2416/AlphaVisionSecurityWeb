@extends('frontend.layouts.main')
@section('title', 'Home')
@section('main-container')

    <!-- BANNER-SECTION -->
    <div class="home-banner-section1 overflow-hidden mt-4">
        <div class="banner-container-box1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="home-banner-text1" data-aos="fade-up">
                        <h3 class="text-white artificial-text">YOUR SECURE ROUTE TO
                        </h3>
                        <h3 class="text-red artificial-text" style="color: red;">COMPLETE
                            SECURITY </h3>
                        <p class="text-white banner-paragraph1">
                            At <b>Alpha Visions</b>, we’re committed to using cutting-edge technology <br>
                            and unshakable devotion to redefine security.
                        </p>
                        <div class="banner-btn1 discover-btn-banner">
                            <a href="{{ url('/quote') }}" class="text-decoration-none">Get a quote</a>
                        </div>
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
    <!-- Services Section -->
    <section class="about-us-section-start about-us-section-2 overflow-hidden">
        <div class="about-right-icon position-relative">
            <figure class="about2-left-img"><img src="frontend/assets/images/about-section2-left-img.png" alt=""
                    class="img-fluid">
            </figure>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center offer-section-title" data-aos="flip-up">OUR SERVICES</h3>
                </div>
            </div>
            <div class="container">
                <div class="row auto-scroll-wrapper d-flex flex-wrap">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 d-flex">
                        <a href="{{ url('/live-cctv-monitoring') }}" style="text-decoration: none; color: inherit;">
                            <div class="about-us-content about-margin-bottom d-flex flex-column" data-aos="fade-up">
                                <div class="icons-rounded-box">
                                    <figure class="mb-0"><img src="frontend/assets/images/about-section2-icon2.png"
                                            alt="">
                                    </figure>
                                </div>
                                <h4>Live CCTV Monitoring</h4>
                                <div class="notshowinmob">
                                    <p class="security-services-p">Our Live CCTV service lets you monitor and protect your
                                        property, loved ones, and belongings in real-time from anywhere, with 24/7 access
                                        through high-definition cameras.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 d-flex">
                        <a href="{{ url('/live-alarm-monitoring') }}" style="text-decoration: none; color: inherit;">
                            <div class="about-us-content about-margin-bottom d-flex flex-column" data-aos="fade-up">
                                <div class="icons-rounded-box">
                                    <figure class="mb-0 icon-color"><img
                                            src="frontend/assets/images/about-section2-icon4.png" alt=""></figure>
                                </div>
                                <h4>Live Alarm Monitoring</h4>
                                <div class="notshowinmob">
                                    <p class="security-services-p">Our Live Alarm Monitoring ensures round-the-clock
                                        protection. When alarms go off, our expert team responds immediately, giving you
                                        peace of mind knowing your security is handled by Alpha Visions.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 d-flex">
                        <a href="{{ url('/installation') }}" style="text-decoration: none; color: inherit;">
                        <div class="about-us-content about-margin-bottom d-flex flex-column" data-aos="fade-up">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="frontend/assets/images/about-section2-icon3.png"
                                        alt="">
                                </figure>
                            </div>
                            <h4>Professional Installation</h4>
                            <div class="notshowinmob">
                                <p class="security-services-p">Our professional security installation service gives you full
                                    control over your home or business security. With advanced alarm and CCTV systems, you can
                                    monitor live feeds, manage alerts, and ensure complete protection.</p>
                            </div>

                        </div>
                    </a>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 d-flex">
                        <div class="about-us-content about-margin-bottom d-flex flex-column" data-aos="fade-up">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="frontend/assets/images/about-section2-icon3.png"
                                        alt="">
                                </figure>
                            </div>
                            <h4>Access Control</h4>
                            <div class="notshowinmob">
                                <p class="security-services-p">Our Access Control solution lets you easily secure and manage
                                    access to your premises, protecting sensitive areas with modern technology and simple
                                    methods. With Alpha Visions, enjoy ultimate control.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Why choose us_SECTION -->
    <section class="about-us-section-start">
        <div class="about-right-icon position-relative" data-aos="fade-right" data-aos-offset="300"
            data-aos-easing="ease-in-sine">
            <figure class="whyus-icon"><img src="frontend/assets/images/about-us-section-right-icon.png" alt=""
                    class="img-fluid">
            </figure>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom">Why Choose Us
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="about-us-content" data-aos="fade-up">
                        <div class="icons-rounded-box">
                            <figure class="mb-0"><img src="frontend/assets/images/about-round-icon3.png" alt="">
                            </figure>
                        </div>
                        <h4>Custom Security</h4>
                        <p class="security-services-p">Alpha Vision Security offers cutting-edge, custom security
                            solutions with state-of-the-art technology to meet your needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="about-us-content" data-aos="fade-up">
                        <div class="icons-rounded-box">
                            <figure class="mb-0 icon-color"><img src="  frontend/assets/images/about-round-icon1.png"
                                    alt="">
                            </figure>
                        </div>
                        <h4>Experienced Team</h4>
                        <p class="security-services-p">Our experienced crew ensures that your security systems run
                            smoothly, providing you with peace of mind.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="about-us-content" data-aos="fade-up">
                        <div class="icons-rounded-box">
                            <figure class="mb-0"><img src="frontend/assets/images/about-round-icon2.png"
                                    alt="">
                            </figure>
                        </div>
                        <h4>Your Trusted Partner</h4>
                        <p class="security-services-p">We are the security partner of choice, dedicated to securing
                            what matters most to you for a safer future.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FUN FACT_SECTION -->
    <section class="icons-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                    <br>
                    <p class="text-center p-0" data-aos="fade-zoom-in" style="color: white;">FUN FACT</p>
                    <h4 class="text-center p-0" data-aos="fade-zoom-in">ALPHA VISIONS ACHIEVEMENTS</h4>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Circle 1 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-image"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">Project Finished</p>
                    <p class="number-text">87+</p>
                </div>

                <!-- Circle 2 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-shield-alt"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">System Secured</p>
                    <p class="number-text">134+</p>
                </div>

                <!-- Circle 3 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-chart-pie"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">Data Center</p>
                    <p class="number-text">12</p>
                </div>

                <!-- Circle 4 -->
                <div class="col-lg-3 col-md-4 col-6 mb-4 text-center">
                    <div class="gradient-border" data-aos="flip-left">
                        <div class="inner-circle">
                            <i class="fas fa-user"></i> <!-- Icon -->
                        </div>
                    </div>
                    <p class="heading-text">Client Happy</p>
                    <p class="number-text">68+</p>
                </div>
            </div>


        </div>
    </section>
    <!-- Why choose AVS-SECTION -->
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
                        <p style="color: rgb(195, 190, 190);">WHY CHOOSE ALPHAVISION</p>
                        <h3>WHERE TRUST <span class="cyber-text"> & TECHNOLOGY MEET</span></h3>
                        <p class="security-services-p">Alpha Vision is your reliable security partner for a number of
                            compelling reasons.
                            We approach every service we provide with innovation, customization, and a commitment to
                            excellence. Our first concern is your mental tranquility,
                            and we deliver knowledgeable answers in a trustworthy manner. By selecting Alpha Visions,
                            you are selecting a partner who is dedicated to your safety and success
                            while reinventing what is possible in the field of safety.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- brand section start --}}
    <div class="container brand-section">
        <div class="text-center my-4">
            <h4 class="fw-bold" style="color: white">FEATURED BRANDS</h4>
            <p class="text-muted" style="color: white">Partnering with the most trusted names in security and
                surveillance.</p>
        </div>

        <!-- ✅ Added row-gap & column-gap -->
        <div class="row row-gap-3 column-gap-3">
            <div class="col-6 col-md-4">
                <div class="brand-card">
                    <img src="frontend/assets/images/swann-logo.png" alt="Swann">
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="brand-card">
                    <img src="frontend/assets/images/lorex-logo.png" alt="Lorex">
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="brand-card">
                    <img src="frontend/assets/images/bosch-logo.png" alt="Bosch">
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="brand-card">
                    <img src="frontend/assets/images/hikvision-logo.png" alt="Swann">
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="brand-card">
                    <img src="frontend/assets/images/uniview-logo.png" alt="Lorex">
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="brand-card">
                    <img src="frontend/assets/images/dahua-logo.png" alt="Bosch">
                </div>
            </div>
        </div>
    </div>
    <!-- Features and benefits-->
    <section class="cyber-security-section cyber-security-section2 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="cyber-content" data-aos="fade-up-left">
                        <h3>FEATURES & <span class="cyber-text">BENEFITS</span></h3>
                        <p class="security-services-p">Our services at Alpha Visions are created with a primary focus
                            on innovation,
                            customisation, and excellence. We use state-of-the-art technology to provide cutting-edge
                            security solutions that are suited to your particular needs, offering a seamless balance of
                            security
                            and ease. Our team of professionals makes sure that your security system runs smoothly,
                            giving you
                            24/7 piece of mind. Our services optimize your business processes, increase productivity,
                            and save
                            expenses in addition to security. Our partnerships are built on trust, openness, and
                            commitment;
                            when you select Alpha Visions, you're choosing a partner dedicated to your security and
                            success,
                            celebrating each accomplishment as a turning point in your journey toward protection.</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 text-md-right text-center">
                    <div class="cyber-content-img-right" data-aos="fade-up-right">
                        <figure class="mb-0"><img src="frontend/assets/images/cyber-security-right-img.png"
                                alt="" class="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our clients-->
    <div class="row">
        <div class="col-12">
            <p class="text-center p-0" data-aos="fade-zoom-in" style="color: white;">OUR CLIENTS</p>
            <h4 class="text-center p-0" data-aos="fade-zoom-in"> <span style="color: red">Our track record of trusted
                </span>
                <span style="color: white">partners and clients</span>
            </h4>
        </div>
    </div>

    <div class="logo-carousel">
        <div class="logos">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 1">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 2">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 3">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 4">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 5">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 6">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 1"> <!-- Duplicate for smooth transition -->
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 2">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 3">
            <img src="frontend/assets/images/hikvision-logo.png" alt="Company 4">
        </div>
    </div>





    <!-- Form-Section -->
    <section class="blogs-section-starts overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-section" data-aos="fade-up">
                        <div class="red-container p-3 d-flex justify-content-between align-items-center flex-wrap">
                            <h5 class="text-white mb-2 mb-md-0 flex-grow-1">
                                Looking for a quality and affordable Security for your project?
                            </h5>
                            <a href="{{ url('/quote') }}">
                                <button class="btn btn-light" style="border-radius: 20px;">Get a Quote</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="height: 20px; background-color: rgb(34, 32, 32) "></div>

@endsection
