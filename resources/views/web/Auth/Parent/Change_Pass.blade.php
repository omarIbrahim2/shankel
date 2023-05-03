@extends('web.layout')

@section('title')
    SHANKEL|CHANGE PASSWORD
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
                                @if (session()->has("error"))
                                <div class="alert alert-success">
                                    {{session('error')}}
                                   </div>
                                @endif
                                <div class="section-title">
                                    <h2 class="text-start">Change Password parent </h2>
                                </div>
                                <div class="contact-form black-contact-form">
                                    <form method="POST" action="{{route('submit-change-pass-parent' , 'parent')}}">
                                        @csrf

                                        @include('web.inc.errors')
                                        
                                        <div class="input-item me-auto ms-0">

                                            <input type="password" name="old_password" placeholder="Old Password">
                                            <span>
                                                <i class="fa-regular fa-envelope"></i>
                                            </span>
                                        </div>
                                        <div class="input-item me-auto ms-0">

                                            <input type="password" name="password" placeholder="New Password">
                                            <span>
                                                <i class="fa-regular fa-envelope"></i>
                                            </span>
                                        </div>
                                        <div class="input-item me-auto ms-0">

                                            <input type="password" name="password_confirmation" placeholder="password confirmation">
                                            <span>
                                                <i class="fa-regular fa-envelope"></i>
                                            </span>
                                        </div>

                                        <div class="input-item me-auto ms-0">
                                            <button type="submit" class="custom-out-btn">
                                                submit
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                            {{-- <x-change-pass actionRoute="submit_change_pass" guard="parent" /> --}}
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
