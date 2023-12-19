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
                            <x-change-pass actionRoute="submit_change_pass_supplier" guard="supplier" />
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
