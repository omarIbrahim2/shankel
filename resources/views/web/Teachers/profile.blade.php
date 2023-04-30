@extends('web.layout')

@section('title')
    Shankl | Teacher Profile
@endsection


@section('nav')
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo/logo.png" alt="shankal">
        </a>
        <div class="auth-btn">
            <form id="outForm" action="{{route("logout" , "teacher")}}" method="POST">
                @csrf
            </form>
            <button form="outForm" class="custom-out-btn" type="submit">Sign Out</button>
            <a class="icons" href="#">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <a class="icons m-0 noti-icon" href="#">
                <i class="fa-regular fa-bell"></i>
                <div class="notification">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="assets/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/logo/noti.png" alt="notification icon">
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
            <a class="icons" href="{{route('teacher-profile')}}">
                <img src="{{asset('assets')}}/images/logo/user.png" alt="user avatar">
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
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Services</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
@endsection

@section('banner-slider')
<div class="home-slider" id="header">
    <div class="home-banner">
        <div class="container">
            <div claas="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="slider-content">
                        <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio possimus
                            maxime eaque laudantium at, soluta sunt omnis aspernatur et blanditiis sequi
                            ea culpa. Aliquid mollitia reiciendis totam minima dolores illo.</P>
                            <a href="#" class="btn-custom">Read more</a>
                            
                    </div>
                </div>
                <div class="col-12">
                    <div class="banner-filter">
                        <form class="filter-form">
                            <div class="filter">
                                <select name="area">
                                    <option  selected disabled>area</option>
                                    <option value="giza">Giza</option>
                                    <option value="cairo">Cairo</option>
                                    <option value="qaliubia">Qaliubia</option>
                                </select>
                            </div>
                            <div class="filter">
                                <select name="grade">
                                    <option selected disabled>grade</option>
                                    <option value="kg">kg</option>
                                    <option value="primary">primary</option>
                                    <option value="secondary">secondary</option>
                                </select>
                            </div>
                            <div class="filter">
                                <input type="text" placeholder="Suggested Installments" name="installment">
                            </div>
                            <div class="filter">
                                <select name="area">
                                    <option selected disabled>Education System</option>
                                    <option value="national">National Program</option>
                                    <option value="international">international</option>
                                    <option value="IG">IG</option>
                                    <option value="sat">sat</option>
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
                    <h2>Our Services</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <div class="section-content">
                    <div class="parent-services">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#00A0DC">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>Private Lectures</h3>
                                    </div>
                                    <a href="#" class="custom-out-btn">
                                        More
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#00A0DC">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-lock-open"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>Public Lecture</h3>
                                    </div>
                                    <a href="#" class="custom-out-btn">
                                        More
                                    </a>
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
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <div class="section-content">
                    <div class="about-welcome">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="welcome">
                                    <h3>Welcome To Shankal</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nihil labore esse
                                    ex
                                    cupiditate numquam est velit minima molestiae! Est a illo eius sapiente labore
                                    consectetur, eaque modi blanditiis molestiae velit debitis ab laborum quos.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident pariatur
                                    cupiditate ullam voluptates beatae rerum, enim sequi quae laudantium nam dolore
                                    alias iure, quo aut et quos blanditiis facere, obcaecati illo possimus laborum.
                                    Assumenda, illo quasi blanditiis repellat temporibus nemo eligendi reprehenderit
                                    maxime exercitationem magnam id perferendis, corrupti impedit eveniet.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt officia
                                    exercitationem nemo voluptates sit ipsa similique voluptatibus libero maxime facere?
                                </p>
                            </div>
                            <div class="col-lg-6 order-lg-0 order-first">
                                <img src="assets/images/logo/Shanklbig.png" alt="about us">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****************** -->
    

    <!-- contact us -->
    <section class="section colored-section p-0 contact-us" id="contact">
        <div class="inner">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="contacts-container">
                        <div class="contacts">
                            <div class="contact-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <a href="https://goo.gl/maps/629oZPALLVBQkjya7">
                                    Amman - Wasfi Al-Tal Street - Al-Waha Roundabout
                                </a>
                            </div>
                            <div class="contact-item">
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:+962 6 5669933">
                                    +962 6 5669933
                                </a>
                            </div>
                            <div class="contact-item">
                                <i class="fa-regular fa-envelope"></i>
                                <a href="mailto:shankal@gmail.com">
                                    shankal@gmail.com
                                </a>
                            </div>
                        </div>
                        <div class="social">
                            <div class="section-title">
                                <h2>Follow Us</h2>
                            </div>
                            <div class="social-icons">
                                <div class="social-item">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="#"><i class="fa-solid fa-m"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="section contact-form-container">
                        <div class="section-title ">
                            <h2 class="text-start">Contact Us</h2>
                        </div>
                        <div class="contact-form ">
                            <form>
                                <div class="input-item">
                                    <input type="text" name="name" placeholder="name">
                                    <span>
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                </div>

                                <div class="input-item">
                                    <input type="email" name="email" placeholder="email">
                                    <span>
                                        <i class="fa-regular fa-envelope"></i>
                                    </span>
                                </div>
                                <div class="input-item">
                                    <input type="text" name="subject" placeholder="subject">
                                    <span>
                                        <i class="fa-solid fa-book"></i>
                                    </span>
                                </div>
                                <div class="input-item">
                                    <input type="text" name="message" placeholder="message">
                                    <span>
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </span>
                                </div>
                                <div class="input-item">
                                    <button type="submit" class="btn-custom">
                                        send a message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection