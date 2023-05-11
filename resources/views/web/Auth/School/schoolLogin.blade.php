@extends('web.layout')


@section('title')
    Shankl | School Login
@endsection

@section('nav')
<x-nav-guest/>
@endsection
@section('main')

<main class="colored-section">
    <nav class="sub-nav">
        <div class="container">
            <ul class="justify-content-center">
                <li><img src="{{asset('assets')}}/images/logo/Shankal.png" alt="shankal"></li>
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
                                <h2 class="text-start">{{trans('auth.LoginToYourAccount')}}</h2>
                                <p class="text-start p-0">{{trans('auth.DoYouHaveAnAccount')}} <a href="{{Route('school_register')}}">{{trans('register.Sign Up')}}</a></p>
                            </div>
                            <div class="contact-form black-contact-form">
                            @if (Session::has('status'))
                                <div class="alert alert-success">
                                    {{Session::get("status")}}
                                </div>
                              @endif
                                <form method="POST" action="{{route('login-school')}}">
                                    @csrf
                                    
                                    @include('web.inc.errors')
                                    <div class="input-item me-auto ms-0">
                                        
                                        <input type="email" name="email" placeholder="{{trans('register.email')}}">
                                        <span>
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                    </div>
                                    
                                    <div class="input-item me-auto ms-0">
                                        <input type="password" name="password" placeholder="{{trans('register.password')}}">
                                        <span>
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <span class="second show-passowrd">
                                            <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                        </span>
                                    </div>
                                    <div class="remember">
                                        <div class="checkbox">
                                            <input type="checkbox" value="remeber" id="remember_me" name="remember_me">
                                            <label>
                                                {{trans('auth.RememberMe')}}
                                            </label>
                                        </div>
                                        <div class="auth">
                                            <a href="{{route('password.request.school')}}">{{trans('auth.ForgotPassword')}}</a>
                                        </div>
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <button type="submit" class="custom-out-btn">
                                            {{trans('auth.Login')}}
                                        </button>
                                    </div>
                                    
                                </form>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="auth-logo">
                            <img src="{{asset('assets')}}/images/logo/Shanklbig.png" alt="shankal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main> 
    
@endsection