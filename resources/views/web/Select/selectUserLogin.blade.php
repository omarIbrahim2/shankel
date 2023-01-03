@extends('web.layout')

@section('title')
    SHANKAL
@endsection
@section('main')
<main class="colored-section">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset("assets")}}/images/logo/logo.png" alt="shankal">
            </a>
            <div class="auth-btn">
                <a href="#" class="custom-out-btn">
                    Sign Up
                </a>
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
                                    <img src="{{asset("assets")}}/images/logo/noti.png" alt="notification icon">
                                    <h5 class="not-author">@hussien</h5>
                                    <p class="not-action">see your request</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset("assets")}}/images/logo/noti.png" alt="notification icon">
                                    <h5 class="not-author">@hussien</h5>
                                    <p class="not-action">see your request</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset("assets")}}/images/logo/noti.png" alt="notification icon">
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
                <a class="icons" href="#">
                    <img src="{{asset("assets")}}/images/logo/user.png" alt="user avatar">
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
    <section class="section select-user">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>Select User</h2>
                </div>
                <div class="user-levels">
                    <a href="{{route('parent_register')}}" class="user-level">
                        <div class="level-img">
                            <img src="{{asset("assets")}}/images/user/Group.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>Parent</h3>
                        </div>
                    </a>
                    <a href="#" class="user-level">
                        <div class="level-img">
                            <img src="{{asset("assets")}}/images/user/Vector.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>Supplier</h3>
                        </div>
                    </a>
                    <a href="#" class="user-level">
                        <div class="level-img">
                            <img src="{{asset("assets")}}/images/user/Vector2.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>school</h3>
                        </div>
                    </a>
                    <a href="#" class="user-level">
                        <div class="level-img">
                            <img src="{{asset("assets")}}/images/user/teach.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>Teacher</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection