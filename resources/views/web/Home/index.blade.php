@extends('web.layout')

@section('title')
Shankal | Home
@endsection
@section('nav')

@custom_auth

<x-nav-auth></x-nav-auth>
@endcustom_auth


@custom_guest
<x-nav-guest />
@endcustom_guest




@endsection

@section('banner-slider')
<!-- banner slider -->
<div class="home-slider" id="header">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($Sliders as $slider)
            <div class="swiper-slide" style="background-image:url({{ asset($slider->image) }})">
                <div class="container">
                    <div claas="row">
                        <div class="col-lg-6 col-md-8 col-12">
                            <div class="slider-content">
                                <h1>{{ $slider->title(App::getLocale()) }}</h1>
                                <P>{{ $slider->info(App::getLocale()) }}</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
@endsection

@section('main')
<!-- about us -->
<section class="section" id="about">
    <x-about-us-section></x-about-us-section>
</section>
<!-- ****************** -->
<!-- features -->
<section class="section colored-section">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>Features</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic eum laborum dignissimos accusantium
                    quaerat odio commodi quos quisquam! Ad, dicta.</p>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="feature-item">
                            <span><i class="fa-regular fa-credit-card"></i></span>
                            <h3>Secure payment</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, tempora.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="feature-item">
                            <span><i class="fa-solid fa-laptop"></i></span>
                            <h3>Easy Usage</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, tempora.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="feature-item">
                            <span><i class="fa-solid fa-book-medical"></i></span>
                            <h3>Easy Booking</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, tempora.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****************** -->

<!-- services -->
<section class="section ">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>Recently Services</h2>
            </div>
            <div class="section-content text-center">
                <div class="row align-items-center mb-5">
                    <!-- add the dynamic data and write the for each -->
                    <div class=" col-lg-4 col-md-6 col-12">
                        <div class="teacher-service card supplier_service_card">
                            <img class="card-img-top" src="#" alt="service">
                            <div class="card-body">
                                <p class="card-text">service 1</p>
                                <p class="card-title fw-bold">10000 JOD</p>
                            </div>
                            <div class="avatar-btns">

                                <div>
                                    <a href="#" class="btn-custom text-center ">add to cart</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="custom-out-btn text-center ">Show More</a>


            </div>
        </div>
    </div>
</section>
<!-- ****************** -->
<!-- schools -->
<section class="section colored-section">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>Schools</h2>
            </div>
            <div class="section-content ">
                <div class="container">
                    <div class="area-container ">

                        <div class="area-content text-center">
                            <div class="row mb-5">
                                <!-- add the dynamic data and write the for each -->
                                @foreach ($Schools as $school)
                                <div class="col-md-4 col-12 search-resault">
                                    <a href="#">
                                        <div class="area-school school-card">
                                            <div class="area-school-img">
                                                <img src="{{asset($school->image)}}" alt="school">
                                            </div>
                                            <div class="area-school-name search-label">
                                                <h4>{{$school->name}}</h4>
                                                <p class=" text-primary">{{$school->type}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                




                            </div>
                            <a href="#" class="custom-out-btn text-center ">Show More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****************** -->
<!-- FAQ -->
<section class="section " id="faq">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>FAQ</h2>
            </div>
            <div class="subtitle">
                <h3>
                    Frequently Asked Questions
                </h3>
            </div>
            <div class="q-slider">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                    General
                                </h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod a nulla, eaque ab
                                    dignissimos ut voluptatibus! Beatae perferendis, voluptatem exercitationem
                                    tenetur inventore neque officia odit?
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                    How I USe?
                                </h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod a nulla, eaque ab
                                    dignissimos ut voluptatibus! Beatae perferendis, voluptatem exercitationem
                                    tenetur inventore neque officia odit?
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                    How Contact?
                                </h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod a nulla, eaque ab
                                    dignissimos ut voluptatibus! Beatae perferendis, voluptatem exercitationem
                                    tenetur inventore neque officia odit?
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                    Book Teacher Section
                                </h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod a nulla, eaque ab
                                    dignissimos ut voluptatibus! Beatae perferendis, voluptatem exercitationem
                                    tenetur inventore neque officia odit?
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                    Payment Method
                                </h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod a nulla, eaque ab
                                    dignissimos ut voluptatibus! Beatae perferendis, voluptatem exercitationem
                                    tenetur inventore neque officia odit?
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                    Add My Children
                                </h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod a nulla, eaque ab
                                    dignissimos ut voluptatibus! Beatae perferendis, voluptatem exercitationem
                                    tenetur inventore neque officia odit?
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                    General
                                </h4>
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod a nulla, eaque ab
                                    dignissimos ut voluptatibus! Beatae perferendis, voluptatem exercitationem
                                    tenetur inventore neque officia odit?
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****************** -->

<!-- gallery -->
<section class="section colored-section" id="gallery">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>{{ trans("home.gallery") }}</h2>
            </div>
            <div class="gallery-images">
                <div class="row">
                    @foreach ($images as $img)
                    <div class="col-md-4 col-12">
                        <div class="gallery-img">
                            <img src="{{ asset($img->image) }}" alt="{{ $img->title }}">
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****************** -->
<!-- partners -->
<section class="section">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>{{trans('partners.partners')}}</h2>
            </div>
            <div class="pratners-data">
                <div class="row">
                    @foreach ($Partners as $partner )
                    <div class="col-md-4">
                        <div class="partner">
                            <img src="{{asset($partner->image)}}" alt="partner">
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****************** -->

<!-- contact us -->
<x-contact-us></x-contact-us>
<!-- ****************** -->
@endsection
