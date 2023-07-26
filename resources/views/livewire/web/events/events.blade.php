<div>

            <div class="event">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-12">
                        <div class="event-left-side">
                            <div class="event-title">
                                <h3>{{ $event->title() }}</h3>
                            </div>
                            <div class="event-meta-data">
                                <div class="event-meta">
                                    <span class="meta-icon"><i class="fa-regular fa-calendar-days"></i></span>
                                    <span class="meta-desc">{{ $event->formatedDate($event->start_date) }} - {{ $event->startAt() }}</span>
                                </div>
                                <div class="event-meta">
                                    <span class="meta-icon"><i class="fa-regular fa-calendar-days"></i></span>
                                    <span class="meta-desc">{{ $event->formatedDate($event->end_date) }} - {{ $event->endAt() }}</span>
                                </div>
                                <div class="event-meta">
                                    <span class="meta-icon"><i class="fa-solid fa-location-dot"></i></span>

                                    <span
                                        class="meta-desc">{{ $event->area->city->name() }},{{ $event->area->name() }}</span>
                                </div>
                            </div>
                            <div class="event-img">
                                <img src="{{ asset( $event->image) }}"  alt="event">
                            </div>
                            <div class="event-description">
                                <p>
                                    {!! $event->desc()!!}

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-12">
                        <div class="event-right-side">
                            <div class="counter">
                                <div class="counter-body" data-date="{{$event->formatedToCounter()}}" data-end="{{$event->endFormatedToCounter()}}">
                                    <div class="counter-item counter-days" >
                                        <span></span>
                                        <p>{{ trans('event.days') }}</p>
                                    </div>
                                    <div class="counter-item counter-hours">
                                        <span></span>
                                        <p>{{ trans('event.hours') }}</p>
                                    </div>
                                    <div class="counter-item counter-minutes">
                                        <span></span>
                                        <p>{{ trans('event.mins') }}</p>
                                    </div>
                                    <div class="counter-item counter-seconds">
                                        <span></span>
                                        <p>{{ trans('event.secs') }}</p>
                                    </div>
                                </div>

                                @if (! Auth::guard('web')->check())
                                   @if ($event->getStatus() != 'Finished' && $event->getStatus() != 'Cancelled')
                                       
                                   @custom_auth
                                   @if ($booked == true)
                                   <div>
                                       <button class="btn btn-success" disabled>{{ trans('event.booked') }}</button>
                                       <button wire:click="cancelBooking({{ $event }})"
                                       class="btn btn-danger">{{ trans('event.clsBook') }}</button>
                                </div>
                                @else
                                <div>
                                    <button wire:click="BookAseat({{ $event }})"
                                    class="white-btn">{{ trans('event.book') }}</button>
                                </div>
                                @endif
                                @endcustom_auth
                                @endif  
                                @endif
                            </div>
                            <div class="loc-data">
                                <div class="event-data-item">
                                    <div class="event-data-icon">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </div>
                                    <div class="event-data-text">
                                        <h5>{{ trans('event.start') }}</h5>
                                        <span>{{ $event->formatedDate($event->start_date) }}</span>
                                    </div>
                                    <div class="mx-5 d-flex ">
                                        <div class="event-data-icon">
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </div>
                                        <div class="event-data-text ">
                                            <h5>{{ trans('event.end') }}</h5>
                                            <span>{{ $event->formatedDate($event->end_date) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="event-data-item">
                                    <div class="event-data-icon">
                                        <i class="fa-regular fa-clock"></i>
                                    </div>
                                    <div class="event-data-text">
                                        <h5>{{ trans('event.startT') }}</h5>
                                        <span>{{ $event->startAt() }}</span>
                                    </div>
                                    <div class="mx-5 d-flex ">
                                        <div class="event-data-icon">
                                            <i class="fa-regular fa-clock"></i>
                                        </div>
                                        <div class="event-data-text ">
                                            <h5>{{ trans('event.finT') }}</h5>
                                            <span>{{ $event->endAt() }}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="event-data-item">
                                    <div class="event-data-icon">
                                        <i class="fa-solid fa-earth-americas"></i>
                                    </div>
                                    <div class="event-data-text">
                                        <h5>{{ trans('event.address') }}</h5>
                                        <span>{{ $event->area->city->name() }},{{ $event->area->name() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




</div>
