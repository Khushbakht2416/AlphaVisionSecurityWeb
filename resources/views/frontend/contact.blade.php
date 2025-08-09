@extends('frontend.layouts.main')
@section('title', 'Contact Us')
@section('main-container')
    <!-- BANNER-SECTION -->
    <div class="home-banner-section overflow-hidden pb-4">
        <div class="banner-container-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                        <div class="about-banner-text" data-aos="fade-up">
                            <h1 class="text-white about-h1" data-aos="zoom-out-left">Contact Us</h1>
                            <div class="about-btn">
                                <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                                <span class="about-text-color"> / </span>
                                <a href="{{ url('/contact-us') }}" class="text-decoration-none">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                        <div class="about-us-section-page contact-us-section" data-aos="fade-up">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <h3 class="contact-us-title" data-aos="fade-up-left">GET IN TOUCH</h3>
                                    <p data-aos="fade-up-right">Feel free to get in touch us by phone or email so
                                        that we can
                                        start working together to accomplish your idea.</p>
                                    <ul class="list-unstyled about-us-list">
                                        <li class="contact-li">
                                            <div class="icons-rounded-box-contact">
                                                <figure class="mb-0"><img src="frontend/assets/images/contact-icon1.png"
                                                        alt=""></figure>
                                            </div>
                                            <div class="contact-content">
                                                <span class="contact-title">Where We Are:</span>
                                                <span class="contact-parah">NSW,
                                                    Australia</span>
                                            </div>
                                        </li>

                                        <li class="contact-li">
                                            <div class="icons-rounded-box-contact">
                                                <figure class="mb-0"><img src="frontend/assets/images/contact-icon2.png"
                                                        alt="">
                                                </figure>
                                            </div>
                                            <div class="contact-content">
                                                <span class="contact-title">Phone:</span>
                                                <span class="contact-parah">02 7229 6438<span class="pr-2 pl-2">
                                            </div>
                                        </li>
                                        <li class="contact-li">
                                            <div class="icons-rounded-box-contact">
                                                <figure class="mb-0"><img src="frontend/assets/images/contact-icon3.png"
                                                        alt="">
                                                </figure>
                                            </div>
                                            <div class="contact-content">
                                                <span class="contact-title">Email:</span>
                                                <span class="contact-parah">info@alphavisionsecurity.com.au</span>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="about-section-form">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success text-center"
                                                style="border-left: 5px solid #d89c9c; background-color:  #a00505; color: white; padding: 15px; border-radius: 8px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif


                                        <form method="post" action="{{ url('/contact-us') }}">
                                            @csrf
                                            <div class="form-group contact-form-margin">
                                                <input type="text" class="form-control input-text"
                                                    id="validationCustom01" placeholder="Your Name" required=""
                                                    name="name" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group contact-form-margin">
                                                <input type="text" class="form-control input-text"
                                                    id="validationCustom02" placeholder="Your Email" required=""
                                                    name="email" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @endif

                                            </div>
                                            <div class="form-group contact-form-margin">
                                                <input type="text" class="form-control input-text"
                                                    id="validationCustom03" placeholder="Subject" required=""
                                                    name="subject" value="{{ old('subject') }}">
                                                @if ($errors->has('subject'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('subject') }}
                                                    </span>
                                                @endif

                                            </div>

                                            <div class="form-group contact-form-margin-text-area">
                                                <textarea name="message" id="message" cols="10" rows="10" class="form-control" placeholder="Your Message">{{ old('message') }}</textarea>
                                                @if ($errors->has('message'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('message') }}
                                                    </span>
                                                @endif

                                            </div>

                                            <div class="contact-section-btn text-center">
                                                <button type="submit" class="btn btn-primary hover-effect">
                                                    Send Message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAP-Section -->
    <div class="map-section overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.332792000837!2d144.96230210000004!3d-37.80567329999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2s!4v1658996311977!5m2!1sen!2s"
                        width="1114" height="366" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!--FAQs-Section -->
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
                        <h3>FAQ</h3>
                        <div class="accordian-inner">
                            <!-- Accordion Container -->
                            <div class="accordion" id="accordionExample">
                                <!-- 1 -->
                                <div class="accordion-card">
                                    <div class="" id="headingFour">
                                        <a href="#" class="btn btn-link text-decoration-none"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            <h5 class="faq-btn-text">What services does Alphavision Security offer?</h5>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                                        data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                Alphavision Security offers a range of services, including alarm monitoring,
                                                CCTV monitoring, access control, and installation of security systems.
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
                                            <h5 class="faq-btn-text">How does your 24/7 live CCTV surveillance work?</h5>
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                        data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                Alphavision's 24/7 live CCTV surveillance streams real-time footage to our
                                                control center, where experts monitor and respond to incidents instantly,
                                                ensuring constant security.
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
                                            <h5 class="faq-btn-text">How often will I receive reports on the security
                                                status of my premises?</h5>
                                        </a>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                        data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                You will receive hourly reports on security status, as well as
                                                incident-based reports whenever an event occurs, ensuring you are always
                                                informed about the security of your premises.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- 4 -->
                                <div class="accordion-card">
                                    <div class="" id="headingSeven">
                                        <a href="#" class="btn btn-link collapsed text-decoration-none"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                            aria-controls="collapseSeven">
                                            <h5 class="faq-btn-text">What sets Alphavision Security apart from other
                                                security providers?</h5>
                                        </a>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                        data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text-left accordian-text-color">
                                                Alphavision Security stands out with its 24/7 live monitoring, advanced
                                                technology, quick incident response, and tailored security solutions to meet
                                                the unique needs of each client, ensuring superior protection.
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
@endsection
