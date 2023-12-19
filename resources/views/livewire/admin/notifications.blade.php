


<div class="table-responsive">


    <table class="table table-bordered table-hover table-striped mb-4 admin_table">
        <thead>
            <tr>
                <th>index</th>
                <th>info</th>
            </tr>
        </thead>
        <tbody>
            @if ($Notifications == null)
                <p>no Notifications</p>
            @else
           @foreach ($Notifications as $notification)

           <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $notification->info }}</td>
            </tr>
            @endforeach
            @endif



        </tbody>
    </table>

    <div class="d-flex">
        <div class="justify-content-center">
      @if ($Notifications->links("livewire.admin-pagination"))
          {{$Notifications->links("livewire.admin-pagination")}}

      @endif
      </div>
   </div>
     </div>
  </div>






