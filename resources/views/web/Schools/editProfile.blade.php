@extends('web.layout');

@section('nav')
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets') }}/images/logo/logo.png" alt="shankal">
        </a>
        <div class="auth-btn">
            <form id="outForm" action="{{route("logout" , "school")}}" method="POST">
                @csrf
            </form>
            <button form="outForm" class="custom-out-btn" type="submit">Sign Out</button>
            <a href="#" class="lang-btn custom-out-btn">
                AR
            </a>
            <a class="icons" href="#">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <a class="icons m-0 noti-icon" href="#">
                <i class="fa-regular fa-bell"></i>
                <div class="notification">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets') }}/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets') }}/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets') }}/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li class="border-0">
                            <a href="#">

                                <p class="not-action">All Notificaation</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </a>
            <a class="icons" href="">
                <img src="{{ asset('assets') }}/images/logo/user.png" alt="user avatar">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#header">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Schools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Teachers</a>
                </li>

            </ul>
        </div>

    </div>
</nav>
@endsection



@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
           
           @livewire('edit-school-profile' , [ 'grades' => $grades , 'eSystems' => $eSystems]);
        </div>
    </div>
</section>

@endsection

