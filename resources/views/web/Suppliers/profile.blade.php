@extends('web.layout')

@section('title')
    Shankl | Supplier Profile
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
                    <h2>{{ trans('supplier.choices') }}</h2>
                    <p>{{ trans('supplier.choicesInfo') }}</p>
                </div>
                <div class="section-content">
                    <div class="parent-services">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#00A0DC">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-dolly"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('supplier.services') }}</h3>
                                    </div>
                                    <a href="{{ route('supplier-services') }}" class="custom-out-btn">
                                        {{ trans('supplier.more') }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#FF2BB3">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-truck-field"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('supplier.areaSuppliers') }}</h3>
                                    </div>
                                    <a href="{{ route('supplier-area-suppliers') }}" class="custom-out-btn">
                                        {{ trans('supplier.more') }}
                                    </a>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-school"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('supplier.areaSchools') }}</h3>
                                    </div>
                                    <a href="{{ route('supplier-area-schools') }}" class="custom-out-btn">
                                        {{ trans('supplier.more') }}
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-building-columns"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('supplier.areaCenters') }}</h3>
                                    </div>
                                    <a href="{{ route('supplier-area-Centers') }}" class="custom-out-btn">
                                        {{ trans('supplier.more') }}
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-children"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('supplier.areaKgs') }}</h3>
                                    </div>
                                    <a href="{{ route('supplier-area-Kgs') }}" class="custom-out-btn">
                                        {{ trans('supplier.more') }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#00A0DC">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-pen-ruler"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('supplier.areaTeachers') }}</h3>
                                    </div>
                                    <a href="{{ route('supplier-area-Teachers') }}" class="custom-out-btn">
                                        {{ trans('supplier.more') }}
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
