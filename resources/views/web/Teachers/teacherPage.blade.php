@extends('web.layout')

@section('nav')

    @custom_auth
        <x-nav-auth></x-nav-auth>
    @endcustom_auth

    @custom_guest
        <x-nav-guest />
    @endcustom_guest

@endsection

@section('main')
    <!-- profie -->
    <section class="section edit-teacher-profile">
        <div class="inner">
            <div class="container">
                <form>
                    <div class="section-content">
                        <div class="row">
                            <div class=" col-md-5 col-12">
                                <div class="left-side teacher-left-side">

                                    <div class="teacher-avatar">
                                        <div class="avatar-container">
                                            <div class="avatar-img">
                                                <img width="100px" src="{{ asset($teacher->image) }}" alt="avatar">
                                                <p><i class="fa-solid fa-location-dot"></i> {{ $teacher->area->name }}</p>
                                            </div>
                                            <div class="avatar-data">
                                                <h4>
                                                    <a href="#">{{ $teacher->name }}</a>
                                                </h4>
                                                <p>{{ $teacher->field }}</p>
                                            </div>
                                        </div>
                                        <div class="avatar-btns">

                                            <div>
                                                <a href="{{ $teacher->cv }}"
                                                    class="btn-custom">{{ trans('teacher.theCv') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-video">
                                        <div class="sub-title sec-sub-title teach-title">
                                            <h3>{{ trans('teacher.email') }}</h3>
                                        </div>
                                        <a href="mailto:elmassar@gmail.com">{{ $teacher->email }}</a>
                                    </div>
                                    <div class="add-video">
                                        <div class="sub-title sec-sub-title teach-title">
                                            <h3>{{ trans('teacher.externalLink') }}</h3>
                                        </div>

                                        <div class="prov-socials teach-socials">
                                            @if ($teacher->facebook | $teacher->twitter | $teacher->linkedin)
                                                @if ($teacher->facebook)
                                                    <div>
                                                        <a href="{{ $teacher->facebook }}"><i
                                                                class="fa-brands fa-facebook-f"></i></a>
                                                    </div>
                                                @endif
                                                @if ($teacher->twitter)
                                                    <div>
                                                        <a href="{{ $teacher->twitter }}"><i
                                                                class="fa-brands fa-twitter"></i></a>

                                                    </div>
                                                @endif
                                                @if ($teacher->linkedin)
                                                    <div>
                                                        <a href="{{ $teacher->linkedin }}"><i
                                                                class="fa-brands fa-linkedin-in"></i></a>
                                                    </div>
                                                @endif
                                            @else
                                                <p>{{ trans('teacher.noSocial') }}</p>
                                            @endif
                                        </div>


                                    </div>
                                    <div class="add-video">
                                        <div class="sub-title sec-sub-title teach-title">
                                            <h3>{{ trans('teacher.phone') }}</h3>
                                        </div>
                                        <a href="tel:+96265669933"><span>
                                                <i class="fa-solid fa-phone"></i>
                                            </span>
                                            <span>+9626{{ $teacher->phone }}</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7  col-12">
                                <div class="right-side">
                                    <div class="row">
                                        @foreach ($lessons as $lesson)
                                        <div class=" col-md-6 col-12">
                                            <div class="teacher-service">
                                                <img src="{{ asset($lesson->image) }}" alt="service">
                                                <h4>{{ $lesson->title }}</h4>
                                                <p>{{ $lesson->type }}</p>
                                                @if ($lesson->type == 'Public')
                                                    <a href="{{ $lesson->url }}" class="btn-custom">{{ trans('teacher.watchNow') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ***************** -->
@endsection
