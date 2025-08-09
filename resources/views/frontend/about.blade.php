@extends('frontend.layouts.main')
@section('title', 'About')
@section('main-container')

        <!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                            <div class="about-banner-text" data-aos="fade-up" >
                                <h1 class="text-white about-h1">About Us</h1>
                                <div class="about-btn">
                                    <a href="{{ url('/') }}" class="text-decoration-none">Home</a> 
                                    <span class="about-text-color"> / </span> 
                                    <a href="{{ url('/about-us') }}" class="text-decoration-none">About</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                            <div class="about-us-section-page" data-aos="fade-up">
                               <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3  data-aos="zoom-out-left">OUR MISSION & VISION</h3>
                                    <p class="lead text-muted mb-4">
                                        Our mission at Alpha Vision Security is to provide unwavering protection for your globe. We are dedicated to providing cutting-edge and specialized security solutions that enable people and organizations to protect what matters most.
                                    </p>
                                    <p class="lead text-muted mb-4">
                                        Our vision is to lead security innovation and establish new benchmarks for security and peace of mind. We want to be your reliable ally, pushing the boundaries of security and applauding your progress toward a safer future.
                                    </p>
                                    
                                     <div class="banner-btn-about discover-btn-banner about-order-services">
                                         </div>
                                         
                                    </div>
                                 <div class="col-lg-5 col-md-5 col-sm-12">
                                     <div class="about-section-img">
                                         <figure class="mb-0"><img src="frontend/assets/images/about-us-page-right-img.png" alt="" class="">
                                         </figure>
                                     </div>
                                 </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- ABOUT-US_SECTION -->
    <section class="about-us-section-start aboutus-page">
        <div class="about-right-icon position-relative">
            <figure class="whyus-icon"><img src="frontend/assets/images/about-us-section-right-icon.png" alt=""
                    class="img-fluid">
            </figure>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Why Choose Us</h3>
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
                            <figure class="mb-0"><img src="frontend/assets/images/about-round-icon2.png" alt="">
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
    <!-- CYBER-SECURITY-SECTION -->
    <section class="cyber-security-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="cyber-content-img">
                        <figure class="mb-0"><img src="frontend/assets/images/cyber-security-left-img.png" alt=""
                                class="cyber-security-provider-img">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="cyber-content">
                        <p style="color: white">WHO WE ARE</p>
                        <h3>Get to Know <span class="cyber-text">Alpha Vision </span> Security</h3>
                        <p class="security-services-p">At Alpha Vision Security, we firmly believe that security
                            and safety are essential to people’s, families’, and organizations’ wellbeing.
                            We are aware that security entails more than just technology; it also involves
                            mental tranquility and safeguarding what is most important. With this steadfast
                            dedication, we have turned Alpha Vision Security into a reliable partner in security.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>


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
                            <a href="{{ url('/quote') }}" class="btn btn-light" style="border-radius: 20px;">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="height: 20px; background-color: rgb(34, 32, 32) "></div>

@endsection
