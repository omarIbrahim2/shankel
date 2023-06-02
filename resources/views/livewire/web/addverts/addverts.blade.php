<div>

    <div class="events-section">
     
@foreach ($addverts as $addvert)
           
       
<div class="event">
    <div class="row">
        <div class="col-md-4">
                <div class="event-img">
                    <img src="{{asset($addvert->image)}}" style="width: 500px" alt="{{$addvert->title}}">
                </div>
                <div class="event-title">
                    <h3>{{$addvert->title}}</h3>
                </div>
                <div class="event-description">
                    <p>
                        {{$addvert->desc}} 
                    </p>
                </div>
        </div>
        {{-- <div class="col-lg-5 col-md-6 col-12 ">
            <div class="event-right-side">
                <div class="counter">
                    <div class="counter-body">
                        <div class="event-description">
                            <p>
                                {{$addvert->desc}} 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endforeach 

<div class="pagination">
    <div class="d-flex">
        <div class="justify-content-center">
            @if ($addverts->links("livewire.admin-pagination"))
                {{$addverts->links("livewire.admin-pagination")}}
            
            @endif
        </div>
   </div>
</div>

