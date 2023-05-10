@extends('web.layout')

@section('nav')

@custom_auth

<x-nav-auth></x-nav-auth>
@endcustom_auth


@custom_guest
<x-nav-guest/>
@endcustom_guest
@endsection


@section('main')

<section class="section">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>Events</h2>
            </div>
            {{-- <div class="events-section">
                <div class="event">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="event-left-side">
                                <div class="event-title">
                                    <h3>Campus Clear Workshop</h3>
                                </div>
                                <div class="event-meta-data">
                                    <div class="event-meta">
                                        <span class="meta-icon"><i class="fa-regular fa-calendar-days"></i></span>
                                        <span class="meta-desc">8 December 2018</span>
                                    </div>
                                    <div class="event-meta">
                                        <span class="meta-icon"><i class="fa-regular fa-clock"></i></span>
                                        <span class="meta-desc">10:00 AM - 3:00 PM</span>
                                    </div>
                                    <div class="event-meta">
                                        <span class="meta-icon"><i class="fa-solid fa-location-dot"></i></span>
                                        <span class="meta-desc">Amman,Jordan</span>
                                    </div>
                                </div>
                                <div class="event-img">
                                    <img src="assets/images/events/event1.webp" alt="event">
                                </div>
                                <div class="event-description">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi itaque amet, odio obcaecati numquam laborum delectus. Deserunt possimus doloribus, reprehenderit, ab blanditiis aspernatur soluta quis et eaque omnis voluptatibus recusandae quo culpa? Iste ratione culpa quod a? Ut dolorem optio distinctio nostrum dolores commodi necessitatibus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="event-right-side">
                                <div class="counter">
                                    <div class="counter-body">
                                        <div class="counter-item">
                                            <span class="days"></span>
                                            <p>Days</p>
                                        </div>
                                        <div class="counter-item">
                                            <span class="hours"></span>
                                            <p>Hours</p>
                                        </div>
                                        <div class="counter-item">
                                            <span class="mins"></span>
                                            <p>Mins</p>
                                        </div>
                                        <div class="counter-item">
                                            <span class="secs"></span>
                                            <p>Secs</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="white-btn">Book Your Seat</a>
                                    </div>
                                </div>
                                <div class="loc-data">
                                    <div class="event-data-item">
                                        <div class="event-data-icon">
                                            <i class="fa-regular fa-clock"></i>
                                        </div>
                                        <div class="event-data-text">
                                            <h5>Start Time</h5>
                                            <span>12:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="event-data-item">
                                        <div class="event-data-icon">
                                            <i class="fa-solid fa-volume-xmark"></i>
                                        </div>
                                        <div class="event-data-text">
                                            <h5>Finish Time</h5>
                                            <span>5:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="event-data-item">
                                        <div class="event-data-icon">
                                            <i class="fa-solid fa-earth-americas"></i>
                                        </div>
                                        <div class="event-data-text">
                                            <h5>Address</h5>
                                            <span>Amman,Jordan</span>
                                        </div>
                                    </div>
                                    <div class="event-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d433870.82683883054!2d36.22782604942593!3d31.835453323080344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b5fb85d7981af%3A0x631c30c0f8dc65e8!2z2LnZhdmR2KfZhtiMINin2YTYo9ix2K_Zhg!5e0!3m2!1sar!2seg!4v1651246839138!5m2!1sar!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="event-left-side">
                                <div class="event-title">
                                    <h3>Campus Clear Workshop</h3>
                                </div>
                                <div class="event-meta-data">
                                    <div class="event-meta">
                                        <span class="meta-icon"><i class="fa-regular fa-calendar-days"></i></span>
                                        <span class="meta-desc">8 December 2018</span>
                                    </div>
                                    <div class="event-meta">
                                        <span class="meta-icon"><i class="fa-regular fa-clock"></i></span>
                                        <span class="meta-desc">10:00 AM - 3:00 PM</span>
                                    </div>
                                    <div class="event-meta">
                                        <span class="meta-icon"><i class="fa-solid fa-location-dot"></i></span>
                                        <span class="meta-desc">Amman,Jordan</span>
                                    </div>
                                </div>
                                <div class="event-img">
                                    <img src="assets/images/events/event1.webp" alt="event">
                                </div>
                                <div class="event-description">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi itaque amet, odio obcaecati numquam laborum delectus. Deserunt possimus doloribus, reprehenderit, ab blanditiis aspernatur soluta quis et eaque omnis voluptatibus recusandae quo culpa? Iste ratione culpa quod a? Ut dolorem optio distinctio nostrum dolores commodi necessitatibus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="event-right-side">
                                <div class="counter">
                                    <div class="counter-body">
                                        <div class="counter-item">
                                            <span class="days"></span>
                                            <p>Days</p>
                                        </div>
                                        <div class="counter-item">
                                            <span class="hours"></span>
                                            <p>Hours</p>
                                        </div>
                                        <div class="counter-item">
                                            <span class="mins"></span>
                                            <p>Mins</p>
                                        </div>
                                        <div class="counter-item">
                                            <span class="secs"></span>
                                            <p>Secs</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="white-btn">Book Your Seat</a>
                                    </div>
                                </div>
                                <div class="loc-data">
                                    <div class="event-data-item">
                                        <div class="event-data-icon">
                                            <i class="fa-regular fa-clock"></i>
                                        </div>
                                        <div class="event-data-text">
                                            <h5>Start Time</h5>
                                            <span>12:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="event-data-item">
                                        <div class="event-data-icon">
                                            <i class="fa-solid fa-volume-xmark"></i>
                                        </div>
                                        <div class="event-data-text">
                                            <h5>Finish Time</h5>
                                            <span>5:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="event-data-item">
                                        <div class="event-data-icon">
                                            <i class="fa-solid fa-earth-americas"></i>
                                        </div>
                                        <div class="event-data-text">
                                            <h5>Address</h5>
                                            <span>Amman,Jordan</span>
                                        </div>
                                    </div>
                                    <div class="event-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d433870.82683883054!2d36.22782604942593!3d31.835453323080344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151b5fb85d7981af%3A0x631c30c0f8dc65e8!2z2LnZhdmR2KfZhtiMINin2YTYo9ix2K_Zhg!5e0!3m2!1sar!2seg!4v1651246839138!5m2!1sar!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <ul>
                    <li><a href="#">previous</a></li>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">next</a></li>
                </ul>
            </div> --}}

            @livewire('web.events.events');
        </div>
    </div>
</section>
<!-- ***************** -->
<!-- footer -->


@endsection
