@extends('frontend.layouts.main')
@section('title', 'Quote')
@section('main-container')

        <!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden pb-4">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                            <div class="about-banner-text" data-aos="fade-up">
                                <h1 class="text-white about-h1" data-aos="zoom-out-left">Get a Quote</h1>
                                <div class="about-btn">
                                    <a href="{{ url('/') }}" class="text-decoration-none">Home</a> 
                                    <span class="about-text-color"> / </span> 
                                    <a href="{{ url('/quote') }}" class="text-decoration-none">Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                            <div class="about-us-section-page contact-us-section" data-aos="fade-up">
                                <div class="row g-7">
                                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                                        <div class="faq-content-img" data-aos="fade-right">
                                            <figure class="mb-0"><img src="frontend/assets/images/accordian-left-img.png"
                                                    alt="" class="">
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="about-section-form">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success text-center" style="border-left: 5px solid #d89c9c; background-color:  #a00505; color: white; padding: 15px; border-radius: 8px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        <p style="color: white;">GET A QUOTE</p>
                                        <h3>Your Road to Improved Security Starts Here</h3>
                                    
                                            <form method="post" action="{{ url('/quote') }}">
                                                @csrf
                                                <div class="form-group contact-form-margin">
                                                    <input type="text" class="form-control input-text"
                                                        id="validationCustom01" placeholder="Your Name"
                                                        required="" name="name"
                                                        value="{{ old('name') }}" >
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">
                                                            {{ $errors->first('name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group contact-form-margin">
                                                    <input type="text" class="form-control input-text"
                                                        id="validationCustom02" placeholder="Your Email"
                                                        required="" name="email"
                                                        value="{{ old('email') }}" > 
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">
                                                            {{ $errors->first('email') }}
                                                        </span>
                                                    @endif  
                                                </div>

                                                <div class="form-group contact-form-margin-text-area">
                                                    <textarea name="message" id="message" cols="10" rows="10" class="form-control"
                                                        placeholder="Your Message">{{  old('message') }}</textarea> 
                                                @if ($errors->has('message'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('message') }}
                                                    </span>
                                                @endif     
                                                </div>
                                                <div class="contact-section-btn text-center">
                                                    <button type="submit" class="btn btn-primary hover-effect">
                                                        Get a Quote</button>
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
    

@endsection
