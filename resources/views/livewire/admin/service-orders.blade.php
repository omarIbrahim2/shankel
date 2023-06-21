



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
        <tr class="text-center">
            <th>Order No.</th>
            <th>Customer Name</th>
            <th>User Type</th>
            <th>Status</th>
            <th>Barcode</th>
            <th>Created at</th>
            <th>Order Details</th>


        </tr>
    </thead>
    <tbody>

         @foreach ($Orders as $order)

         <tr class="text-center">

            <td>{{$order->id}}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{$order->getUserType($order->user_type)}}</td>
            <td><span class="text-secondary">{{ $order->status }}</span></td>
            <td>{{$order->barcode}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                <a href="{{ route('orders-details', $order->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
            </td>


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


