@extends('web.layout')

@section('title')
    Shankal | Parent Profile
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection


@section('banner-slider')

    <!-- banner slider -->
    <div class="home-slider" id="header">

        <div class="home-banner" style="background-image: url({{ asset($slider == null ? 'assets/images/banner/sup-banner.png' : $slider->image) }})">
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
                    <div class="col-12">
                        <div class="banner-filter">
                            <form  action="{{route('filter-schools')}}" class="filter-form">
                                <div class="filter">
                                    <select name="area_id">
                                        <option selected disabled>{{ trans('parent.area') }}</option>
                                          @foreach ($Areas as $area)
                                           <option value="{{$area->id}}">{{$area->name()}}</option>
                                          @endforeach
                                    </select>
                                </div>
                                <div class="filter">
                                    <select name="grade_id">
                                        <option selected disabled>{{ trans('parent.grade') }}</option>
                                            @foreach ($Grades as $grade)
                                             <option value="{{$grade->id}}">{{$grade->name()}}</option>
                                           @endforeach
                                    </select>
                                </div>
                                <div class="filter">
                                    <select name="edu_systems_id">
                                        <option selected disabled>{{ trans('parent.Esystem') }}</option>
                                            @foreach ($Esystems as $Esystem)
                                              <option value="{{$Esystem->id}}">{{$Esystem->name()}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="filter-submit">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
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
                    <h2>{{ trans('parent.choices') }}</h2>
                    <p>{{ trans('parent.choicesInfo') }}</p>
                </div>
                <div class="section-content">
                    <div class="parent-services">
                        <div class="row justify-content-center">

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#FF2BB3">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('parent.schArea') }}</h3>
                                    </div>
                                    
                                    <a href="{{ route('area-schools') }}" class="custom-out-btn">
                                        {{ trans('parent.more') }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('parent.events') }}</h3>
                                    </div>
                                    <a href="{{ route('reserved-events') }}" class="custom-out-btn">
                                        {{ trans('parent.more') }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-building-columns"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('parent.schools') }}</h3>
                                    </div>
                                    <a href="{{ route('reserved-schools') }}" class="custom-out-btn">
                                        {{ trans('parent.more') }}
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#00A0DC">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-pen-ruler"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('parent.teachers') }}</h3>
                                    </div>
                                    <a  href="{{ route('reserved-teachers') }}" class="custom-out-btn">
                                        {{ trans('parent.more') }}
                                    </a>
                                </div>
                            </div> --}}
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
