@extends('web.layout')

@section('title')
    Shankl | Teacher Profile
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection

@section('banner-slider')
<div class="home-slider" id="header">
    <div class="home-banner"  style="background-image: url({{ asset($slider == null ? 'assets/images/banner/sup-banner.png' : $slider->image) }})">
        <div class="container">
            <div claas="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="slider-content">
                        @if ($slider)
                        <P>{{ $slider->title(App::getLocale()) }}</P>
                        <p>{{ $slider->info(App::getLocale())  }}</p>       
                        @endif
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
      <!-- services -->
      <section class="section colored-section">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>{{ trans('teacher.choices') }}</h2>
                    <p>{{ trans('teacher.choicesInfo') }}</p>
                </div>
                <div class="section-content">
                    <div class="parent-services">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#00A0DC">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-lock-open"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('teacher.publicLec') }}</h3>
                                    </div>
                                    <a href="{{ route('teacher-public-lessons') }}" class="custom-out-btn">
                                        {{ trans('teacher.more') }}
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('teacher.events') }}</h3>
                                    </div>
                                    <a href="{{ route('teacher-reserved-events') }}" class="custom-out-btn">
                                        {{ trans('teacher.more') }}
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- **************** -->
    <!-- about us -->
    <section class="section" id="about">
        <x-about-us-section></x-about-us-section>
    </section>
    <!-- ****************** -->
    

    <!-- contact us -->
    <x-contact-us></x-contact-us> 
    <!-- ****************** -->

    
@endsection