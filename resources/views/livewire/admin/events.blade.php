

 

  <div class="table-responsive">
    <div>
        <form  class="form-inline my-2 my-lg-0 justify-content-center">
            <div class="w-50">
                <input wire:model="searchEvent" type="text" class="w-100 form-control product-search br-30" id="input-search" placeholder="Search by Title">
                {{-- <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button> --}}
            </div>
        </form>
       </div>

       <a href="{{route('create-events-view')}}" class="btn btn-success">Add Event</a>

       <table class="table table-bordered table-hover table-striped mb-4">
    <thead>
        <tr>
            <th>image</th>
            <th>title</th>
            <th>start date</th>
            <th>end date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
            
        </tr>
    </thead>
    <tbody>
        
         @foreach ($events as $event)
         <tr>
            
            <td><img src="{{asset('uploads')}}/{{$event->image}}" alt="" style="width: 50px"></td>
            <td>{{$event['title']}}</td>
            <td>{{$event["start_at"]}}</td>
            <td>{{$event["end_at"]}}</td>
            <td class="text-center"><span class="text-secondary">{{ $event->status }}</span></td>
             <td class="text-center">
            <ul class="table-controls">
                <li><a href="{{route("update-events-view" , $event->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                <form action="{{route('cancel-event') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-custom" >cancel event</button>
                </form>
            </ul>
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

