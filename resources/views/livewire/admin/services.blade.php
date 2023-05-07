

<div class="table-responsive">
    <div>
        <form  class="form-inline my-2 my-lg-0 justify-content-center">
            <div class="w-50">
                <input type="text" class="w-100 form-control product-search br-30" id="input-search" placeholder="Search by Title">
                <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
            </div>
        </form>
       </div>
         
      
       <a href="{{route("service-create-form" , $supplierId)}}" class="btn btn-success">Add Service</a>    
      
       

       <table class="table table-bordered table-hover table-striped mb-4">
    <thead>
        <tr>
            <th>image</th>
            <th>name</th>
             <th class="text-center">Actions</th>    
            
            
        </tr>
    </thead>
    <tbody>
        @if ($Services == null)
            <p>no Services</p>
        @else
        @foreach ($Services as $service)
        <tr>
           
           <td><img src="{{asset($service->image)}}" alt="" style="width: 50px"></td>
           <td>{{$service['name']}}</td>
           <td class="text-center">
            
               <ul class="table-controls">
                   <li><a href="{{route("service-update-form" , $service->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                   <li><a href="{{route("service-delete" , $service->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
               </ul>
             </td>     

          
       </tr>
        @endforeach  
        @endif
       
       
        
    </tbody>
       </table>
        <div class="d-flex">
          <div class="justify-content-center">
        @if ($Services != null)
           @if ($Services->links("livewire.admin-pagination"))
                {{$Services->links("livewire.admin-pagination")}}
     
           @endif
        @endif
            
            
     
        </div>
     </div>
  </div>     



  
