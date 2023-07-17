@extends('web.layout')

@section('title')
    Shankl | School Profile
@endsection

@section('nav')
    <x-nav-auth></x-nav-auth>
@endsection


@section('banner_slider')
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
                                        <option selected disabled>{{ trans('parent.eSystems') }}</option>
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
                    <h2>{{ trans('teacher.choices') }}</h2>
                    <p>{{ trans('teacher.choicesInfo') }}</p>
                </div>
                <div class="section-content">
                    <div class="parent-services">
                        <div class="row justify-content-center">

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#FF2BB3">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-calendar-week"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('school.myevents') }}</h3>
                                    </div>
                                    <a href="{{ route('school-my-events') }}" class="custom-out-btn">
                                        {{ trans('school.more') }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('school.events') }}</h3>
                                    </div>
                                    <a href="{{ route('school-reserved-events') }}" class="custom-out-btn">
                                        {{ trans('school.more') }}
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-children"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('school.students') }}</h3>
                                    </div>
                                    <a href="{{ route('school-students') }}" class="custom-out-btn">
                                        {{ trans('teacher.more') }}
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#FF2BB3">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-truck-field"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>{{ trans('school.areaSuppliers') }}</h3>
                                    </div>
                                    <a href="{{ route('school-area-suppliers') }}" class="custom-out-btn">
                                        {{ trans('teacher.more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="counter">
                        <div class="counter-inner">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="counter-item text-center">
                                        <h4>{{ trans('school.parents') }}</h4>
                                        <p>{{ count($studentsParents) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="counter-item text-center">
                                        <h4>{{ trans('school.students') }}</h4>
                                        <p>{{ count($students) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="counter-item text-center">
                                        <h4>{{ trans('school.visits') }}</h4>
                                        <p>{{auth()->guard('school')->user()->views}}</p>
                                    </div>
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
