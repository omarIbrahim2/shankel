



  <div class="table-responsive">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
    <div class="search_table">
        <form  class="form-inline my-2 mb-3 justify-content-center">
            <div class="w-100">
                <input wire:model="searchEvent" type="text" class="w-100 form-control product-search br-30" id="input-search" placeholder="Search by Title">
            </div>
        </form>
       </div>

       <a href="{{route('create-events-view')}}" class="btn btn-success margin_res">Add Event</a>
    </div>
  
   
    <form id="cancelEvent" action="{{route('cancel-event') }}" method="POST">
        @csrf
    </form>

       <table class="table table-bordered table-hover table-striped mb-4 admin_table">
    <thead>
        <tr>
            <th>image</th>
            <th>title En</th>
            <th>title Ar</th>
            <th>start date</th>
            <th>end date</th>
            <th>start time</th>
            <th>end time</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>

        </tr>
    </thead>
    <tbody>

         @foreach ($events as $event)
         <tr>

            <td><img src="{{asset('uploads')}}/{{$event->image}}" alt="" style="width: 50px"></td>
            <td class="elpsis">{{$event->title('en')}}</td>
            <td class="elpsis">{{$event->title('ar')}}</td>
            <td>{{$event["start_date"]}}</td>
            <td>{{$event["end_date"]}}</td>
            <td>{{$event["start_time"]}}</td>
            <td>{{$event["end_time"]}}</td>
            <td class="text-center"><span class="text-secondary">{{$event->status}}</span></td>
             <td class="text-center">

                <a href="{{route('update-events-view' , $event->id)}}" class="btn mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
     
                  @if ($event->status != 'Cancelled' || $event != 'Finished')
                      <input form="cancelEvent" type="hidden" name="id" value="{{ $event->id }}">
                      <input form="cancelEvent" type="hidden" name="status" value="{{$event->status}}">
                      <button form="cancelEvent" type="submit" class="btn btn-danger" >cancel event</button>
                  @endif             
                    
    
          </td>
        </tr>
         @endforeach


    </tbody>
       </table>
        <div class="d-flex">
          <div class="justify-content-center">
        @if ($events->links("livewire.admin-pagination"))
            {{$events->links("livewire.admin-pagination")}}

        @endif
        </div>
     </div>
  </div>

