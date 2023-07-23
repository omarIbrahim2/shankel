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
                                <P>{!! $slider->info(App::getLocale()) !!}</P>
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
                <h2>{{ trans("home.features") }}</h2>
                <p>{{ trans("home.featureTitle") }}</p>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="feature-item">
                            <span><i class="fa-regular fa-credit-card"></i></span>
                            <h3>{{ trans("home.SecurePayment") }}</h3>
                            <p>{{ trans("home.SecurePaymentContent") }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="feature-item">
                            <span><i class="fa-solid fa-laptop"></i></span>
                            <h3>{{ trans("home.EasyUsage") }}</h3>
                            <p>{{ trans("home.EasyUsageContent") }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="feature-item">
                            <span><i class="fa-solid fa-book-medical"></i></span>
                            <h3>{{ trans("home.EasyBooking") }}</h3>
                            <p>{{ trans("home.EasyBookingContent") }}</p>
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
                <h2>{{trans('home.recentSer')}}</h2>
            </div>
            <div class="section-content text-center">
                <div class="row align-items-center mb-5">
                    <!-- add the dynamic data and write the for each -->

                    @foreach ($Services as $service)
                    <div class=" col-lg-4 col-md-6 col-12">
                        <div class="teacher-service card supplier_service_card">
                            <img class="card-img-top" src="{{asset($service->image)}}" alt="service">
                            <div class="card-body">
                                <p class="card-title fw-bold">{{$service->name()}}</p>
                                <p class="card-text supplier-service-desc">unleash e-business models
                                                    unleash e-business models unleash e-business models unleash
                                                    e-business models</p>
                                <p class="card-title fw-bold">{{$service->price}} JOD</p>
                            </div>
                            <div class="avatar-btns">
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <a href="{{route('web-services')}}" class="custom-out-btn text-center ">{{trans('home.showMore')}}</a>


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
                <h2>{{trans('home.famousSch')}}</h2>
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
                                                <h4>{{$school->name()}}</h4>
                                                <p class=" text-primary">{{$school->type}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <a href="{{route('web-schools')}}"
                                class="custom-out-btn text-center ">{{trans('home.showMore')}}</a>
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
                <h2>{{ trans("home.faq") }}</h2>
            </div>
            <div class="subtitle">
                <h3>
                {{ trans("home.faqs") }}
                </h3>
            </div>
            <div class="q-slider">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                {{ trans("home.faq1Title") }}
                                </h4>
                                <p>
                                {{ trans("home.faq1Content") }}
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                {{ trans("home.faq2Title") }}
                                </h4>
                                <p>
                                {{ trans("home.faq2Content") }}
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                {{ trans("home.faq1Title") }}
                                </h4>
                                <p>
                                {{ trans("home.faq1Content") }}
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                {{ trans("home.faq2Title") }}
                                </h4>
                                <p>
                                {{ trans("home.faq2Content") }}
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                {{ trans("home.faq1Title") }}
                                </h4>
                                <p>
                                {{ trans("home.faq1Content") }}
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                {{ trans("home.faq2Title") }}
                                </h4>
                                <p>
                                {{ trans("home.faq2Content") }}
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="question">
                                <h4>
                                {{ trans("home.faq1Title") }}
                                </h4>
                                <p>
                                {{ trans("home.faq1Content") }}
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
