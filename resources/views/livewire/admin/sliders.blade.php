


<div class="table-responsive">

       <div class="d-flex align-items-center justify-content-between flex-wrap">
       <a href="{{ route("slider-create-form") }}" class="btn btn-success mb-sm-3 margin_res">Add Slider</a>
       </div>



       <table class="table table-bordered table-hover table-striped mb-4 admin_table">
    <thead>
        <tr>
            <th>index</th>
            <th>image</th>
            <th>title</th>
             <th class="text-center">Actions</th>


        </tr>
    </thead>
    <tbody>
        @if ($Sliders == null)
            <p>no Services</p>
        @else
        @foreach ($Sliders as $slider)
        <tr>
           <td>{{ $loop->iteration }}</td>
           <td><img src="{{asset($slider->image)}}" alt="" style="width: 50px"></td>
           <td class="elpsis">{{$slider->title()}}</td>
           <td class="text-center elpsis_controls">

               <div class="d-flex justify-content-center align-items-center flex-wrap">
                   <div><a href="{{ route('slider-update-form' , $slider->id) }}" class="btn btn-success mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></div>
                   <div><a href="{{ route('slider-delete' , $slider->id) }}" class="btn btn-danger mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></div>
                   <div><a href="{{ route('slider-show' , $slider->id) }}" class="btn btn-primary mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="eye"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg></a></div>
               </div>
             </td>


       </tr>
        @endforeach
        @endif



    </tbody>
       </table>
        <div class="d-flex">
          <div class="justify-content-center">
        @if ($Sliders != null)
           @if ($Sliders->links("livewire.admin-pagination"))
                {{$Sliders->links("livewire.admin-pagination")}}

           @endif
        @endif



        </div>
     </div>
  </div>





