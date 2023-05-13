

 

  <div class="table-responsive">
    <div>
        <form  class="form-inline my-2 my-lg-0 justify-content-center">
            <div class="w-50">
                <input wire:model="searchOrder" type="text" class="w-100 form-control product-search br-30" id="input-search" placeholder="Search by Order no">
                {{-- <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button> --}}
            </div>
        </form>
       </div>

     

       <table class="table table-bordered table-hover table-striped mb-4">
    <thead>
        <tr>
            <th>order no.</th>
            <th>School</th>
            <th>Parent</th>
            <th class="text-center">Status</th>
            <th>created at</th>
        
            
        </tr>
    </thead>
    <tbody>
        
         @foreach ($Orders as $order)
  
         <tr>
            
            <td>{{$order->id}}</td>
            <td><a href="#">{{$order->school->name}} </a> </td>
            <td>{{$order->parentt->name}}</td>
            @if ($order->status == true)
              <td class="text-center"><span class="text-secondary">Compeleted</span></td>
            @else
               <td class="text-center"><span class="text-danger">Cancelled</span></td>
            @endif

            {{-- <td>{{\Carbon\Carbon::createFromFormat('Y-m-d' , $order->created_at)->format("d F Y")}}</td> --}}

            <td>{{$order->created_at}}</td>
             
        </tr>

         @endforeach  
       
        
    </tbody>
       </table>
        <div class="d-flex">
          <div class="justify-content-center">
        @if ($Orders->links("livewire.admin-pagination"))
            {{$Orders->links("livewire.admin-pagination")}}
         
        @endif
        </div>
     </div>
  </div>  


