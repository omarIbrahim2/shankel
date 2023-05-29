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
                        <span class="meta-desc">{{$event->formatedDate($event->start)}}</span>
                    </div>
                    <div class="event-meta">
                        <span class="meta-icon"><i class="fa-regular fa-clock"></i></span>
                        <span class="meta-desc">{{$event->startAt()}} - {{$event->endAt()}}</span>
                    </div>
                    <div class="event-meta">
                        <span class="meta-icon"><i class="fa-solid fa-location-dot"></i></span>
                     
                        <span class="meta-desc">{{$event->area->city->name}},{{$event->area->name}}</span>
                    </div>
                </div>
                <div class="event-img">
                    <img src="{{asset('uploads/'.$event->image)}}" style="width: 500px" alt="event">
                </div>
                {{-- assets/images/events/event1.webp --}}
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
                            <span  ></span>
                            <p>{{ trans('event.days') }}</p>
                        </div>
                        <div class="counter-item">
                            <span class="hours"></span>
                            <p>{{ trans('event.hours') }}</p>
                        </div>
                        <div class="counter-item">
                            <span class="mins"></span>
                            <p>{{ trans('event.mins') }}</p>
                        </div>
                        <div class="counter-item">
                            <span class="secs"></span>
                            <p>{{ trans('event.secs') }}</p>
                        </div>
                    </div>
                    @custom_auth

                    @if ($event->booked == true)
                        <div>
                        <button class="btn btn-success" disabled>{{ trans('event.booked') }}</button>
                        <button wire:click="cancelBooking({{$event}})" class="btn btn-danger">{{ trans('event.clsBook') }}</button>
                      </div>

                    @else
                    <div>
                        <button wire:click="BookAseat({{$event}})"  class="white-btn">{{ trans('event.book') }}</button>
                    </div>
                    @endif
                    
                    @endcustom_auth
                </div>
                <div class="loc-data">
                    <div class="event-data-item">
                        <div class="event-data-icon">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div class="event-data-text">
                            <h5>{{ trans('event.startT') }}</h5>
                            <span>{{$event->startAt()}}</span>
                        </div>
                    </div>
                    <div class="event-data-item">
                        <div class="event-data-icon">
                            <i class="fa-solid fa-volume-xmark"></i>
                        </div>
                        <div class="event-data-text">
                            <h5>{{ trans('event.finT') }}</h5>
                            <span>{{$event->endAt()}}</span>
                        </div>
                    </div>
                    <div class="event-data-item">
                        <div class="event-data-icon">
                            <i class="fa-solid fa-earth-americas"></i>
                        </div>
                        <div class="event-data-text">
                            <h5>{{ trans('event.address') }}</h5>
                            <span>{{$event->area->city->name}},{{$event->area->name}}</span>
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

