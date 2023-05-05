<div>

    <div class="events-section">
     
@foreach ($Events as $event)
           
       
<div class="event">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-12">
            <div class="event-left-side">
                <div class="event-title">
                    <h3>{{$event->title}}</h3>
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
                        {{$event->desc}}
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
                            <span>{{$event->start_at}}</span>
                        </div>
                    </div>
                    <div class="event-data-item">
                        <div class="event-data-icon">
                            <i class="fa-solid fa-volume-xmark"></i>
                        </div>
                        <div class="event-data-text">
                            <h5>Finish Time</h5>
                            <span>{{$event->end_at}}</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 

<div class="pagination">
@if ($Events->links("livewire.web-pagination"))
{{$Events->links("livewire.web-pagination")}}
 </div>
    </div>
   

 
@endif


</div>

