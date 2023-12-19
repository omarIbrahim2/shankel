



  <div class="table-responsive">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
    <div class="search_table">
        <form  class="form-inline my-2 mb-3 justify-content-center">
            <div class="w-100">
                <input wire:model="searchOrder" type="text" class="w-100 form-control product-search br-30" id="input-search" placeholder="Search by Order no">
            </div>
        </form>
       </div>
    </div>



       <table class="table table-bordered table-hover table-striped mb-4 admin_table">
    <thead>
        <tr>
            <th>order no.</th>
            <th>School</th>
            <th>Parent</th>
            <th class="text-center">Status</th>
            <th>created at</th>
            <th>Order Details</th>


        </tr>
    </thead>
    <tbody>

         @foreach ($Orders as $order)

         <tr>

            <td>{{$order->id}}</td>
            <td>{{$order->school->name('ar')}}</td>
            <td>{{$order->parentt->name('ar')}}</td>
            @if ($order->status == true)
              <td class="text-center"><span class="text-secondary">Compeleted</span></td>
            @else
               <td class="text-center"><span class="text-danger">Cancelled</span></td>
            @endif

            <td>{{$order->created_at}}</td>
             
            @if ($order->status == true)
            <td>
              <a href="{{route('order' , $order->id)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
            </td>
            @endif
           

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


