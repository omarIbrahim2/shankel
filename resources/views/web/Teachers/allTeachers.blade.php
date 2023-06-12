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
    <section class="section edit-teacher-profile">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>Teachers</h2>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach ($teachers as $teacher)
                            <div class="col-md-4 col-12">
                                <div class="teacher-item">
                                    <div class="teacher-item-img">
                                        <img width="250px" src="{{ asset( $teacher->image ) }}" alt="teacher">
                                    </div>
                                    <div class="teacher-item-data">
                                        <h3>{{ $teacher->name }}</h3>
                                        <h4>{{ $teacher->field }} Teacher</h4>
                                        
                                    </div>
                                    <div class="teacher-item-social">
                                        @if ($teacher->facebook)
                                            <div>
                                                <a href="{{ $teacher->facebook }}"><i
                                                        class="fa-brands fa-facebook-f"></i></a>
                                            </div>
                                        @endif
                                        @if ($teacher->twitter)
                                            <div>
                                                <a href="{{ $teacher->twitter }}"><i class="fa-brands fa-twitter"></i></a>

                                            </div>
                                        @endif
                                        @if ($teacher->linkedin)
                                            <div>
                                                <a href="{{ $teacher->linkedin }}"><i
                                                        class="fa-brands fa-linkedin-in"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
