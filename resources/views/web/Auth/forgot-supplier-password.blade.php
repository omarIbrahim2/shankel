@extends('web.layout')

@section('title')
    SHANKEL|FORGOT PASSWORD
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
                                    <h2 class="text-start">{{ trans('supplier.enterEmail') }}</h2>
                                </div>
                                <div class="contact-form black-contact-form">
                                    @if (Session::has('status'))
                                        <div class="alert alert-success">
                                            {{Session::get("status")}}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('password.email' , 'suppliers') }}">
                                        @csrf

                                        @include('web.inc.errors')
                                        <div class="input-item me-auto ms-0">

                                            <input type="email" name="email" placeholder="{{ trans('supplier.email') }}">
                                            <span>
                                                <i class="fa-regular fa-envelope"></i>
                                            </span>
                                        </div>

                                        <div class="input-item me-auto ms-0">
                                            <button type="submit" class="custom-out-btn">
                                                {{ trans('supplier.send') }}
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
