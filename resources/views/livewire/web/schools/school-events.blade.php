<div>
            <div class="event">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-12">
                        <div class="event-left-side">
                            <div class="event-title">
                                <h3>{{   $event->title() }}</h3>
                            </div>
                            <div class="event-meta-data">
                                <div class="event-meta">
                                    <span class="meta-icon"><i class="fa-regular fa-calendar-days"></i></span>
                                    <span class="meta-desc">{{ $event->formatedDate($event->start_date) }}</span>
                                </div>
                                <div class="event-meta">
                                    <span class="meta-icon"><i class="fa-regular fa-clock"></i></span>
                                    <span class="meta-desc">{{ $event->startAt() }} - {{ $event->endAt() }}</span>
                                </div>
                                <div class="event-meta">
                                    <span class="meta-icon"><i class="fa-solid fa-location-dot"></i></span>

                                    <span
                                        class="meta-desc">{{ $event->area->city->name() }},{{ $event->area->name() }}</span>
                                </div>
                            </div>
                            <div class="event-img">
                                <img src="{{ asset($event->image) }}"
                                    style="width: 500px" alt="event">
                            </div>
                            <div class="event-description">
                                <p>
                                    {!! $event->desc() !!}

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-12">
                        <div class="event-right-side">
                            <div class="counter">
                                <div class="counter-body"  data-date="{{$event->formatedToCounter()}}">
                                    <div class="counter-item">
                                        <span></span>
                                        <p>{{ trans('event.days') }}</p>
                                    </div>
                                    <div class="counter-item">
                                        <span></span>
                                        <p>{{ trans('event.hours') }}</p>
                                    </div>
                                    <div class="counter-item">
                                        <span></span>
                                        <p>{{ trans('event.mins') }}</p>
                                    </div>
                                </div>
                                 
                                @if ($status == 'Cancelled' || $status == 'Finished')
                                   <div class="text-center mt-2">
                                           
                                      <a href="{{route("school-edit-view-event" , $event->id)}}" class="btn btn-info">{{trans('event.update')}}</a>
                                   </div>
                                @else
                                <div class="text-center mt-2">
                                           
                                    <a href="{{route("school-edit-view-event" , $event->id)}}" class="btn btn-info">{{trans('event.update')}}</a>
                                 </div>
                                
                                <div class="text-center mt-2">
                                    <form wire:submit.prevent="cancelEvent({{$event}})" >
                                        <button type="submit" class="btn btn-danger" >{{ trans('event.cls') }}</button>
                                    </form>
                                </div>

                                @endif
                              


                                
                                  
                                
                                {{-- end comment --}}
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
                                        <span>{{ $event->area->city->name()}},{{ $event->area->city->name() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
