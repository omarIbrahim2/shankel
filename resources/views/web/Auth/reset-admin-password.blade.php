@extends('web.layout')

@section('title')
    SHANKEL|RESET PASSWORD
@endsection

@section('nav')
<x-nav-guest/>
@endsection
@section('main')
    <main class="colored-section">
        <nav class="sub-nav">
            <div class="container">
                <ul class="justify-content-center">
                    <li><img src="{{ asset('assets') }}/images/logo/Shankal.png" alt="shankal"></li>
                </ul>
            </div>
        </nav>
        <section class="section ">
            <div class="inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-12">
                            <div class="left-side">
                                <div class="section-title">
                                    <h2 class="text-start">Enter Your Email</h2>
                                </div>
                                <div class="contact-form black-contact-form">
                                    <form method="POST" action="{{ route('password.update', ['broker' => 'users' , 'guard' => 'web']) }}">
                                        @csrf

                                        @include('web.inc.errors')
                                        <input type="hidden" name="token" value="{{$token}}">
                                        <div class="input-item me-auto ms-0">

                                            <input type="email" name="email" placeholder="{{}}">
                                            <span>
                                                <i class="fa-regular fa-envelope"></i>
                                            </span>
                                            @error("email")
                                              <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">

                                            <input type="password" name="password" placeholder="{{trans('auth.password')}}">
                                            <span>
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                            <span class="second show-passowrd">
                                                <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                            </span>
                                            @error("password")
                                            <p class="text-danger">{{$message}}</p>
                                          @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">

                                            <input type="password" name="password_confirmation" placeholder="{{trans('auth.passConfirm')}}">
                                            <span>
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                            <span class="second show-passowrd">
                                                <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                            </span>
                                            @error("password_confirmation")
                                            <p class="text-danger">{{$message}}</p>
                                          @enderror
                                        </div>

                                        <div class="input-item me-auto ms-0">
                                            <button type="submit" class="custom-out-btn">
                                                {{trans('auth.send')}}
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-12">
                            <div class="auth-logo">
                                <img src="{{ asset('assets') }}/images/logo/Shanklbig.png" alt="shankal">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
