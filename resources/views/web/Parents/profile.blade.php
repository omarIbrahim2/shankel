@extends('web.layout')

@section('title')
    Shankal | Parent Profile
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection


@section('banner-slider')

    <!-- banner slider -->
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
                                        <option selected disabled>area</option>
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
                                <div class="service" style="--clr:#FF2BB3">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>My Area</h3>
                                    </div>
                                    <a href="#" class="custom-out-btn">
                                        More
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>Events</h3>
                                    </div>
                                    <a href="#" class="custom-out-btn">
                                        More
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#AF62A6">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-building-columns"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>School</h3>
                                    </div>
                                    <a href="#" class="custom-out-btn">
                                        More
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="service" style="--clr:#00A0DC">
                                    <div class="service-icon">
                                        <i class="fa-solid fa-pen-ruler"></i>
                                    </div>
                                    <div class="service-name">
                                        <h3>Teacher</h3>
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
    <x-contact-us></x-contact-us>
    <!-- ****************** -->
@endsection
