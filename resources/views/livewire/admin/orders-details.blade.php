



<div class="table-responsive">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
  
    </div>



       <table class="table table-bordered table-hover table-striped mb-4 admin_table">
    <thead>
        <tr class="text-center">
            <th>Service Name</th>
            <th>Srevice Descripition</th>
            <th>Srevice Price</th>
            


        </tr>
    </thead>
    <tbody>

         @foreach ($services as $service)

         <tr class="text-center">
            <td>{{ $service->name }}</td>
            <td>{{$service->desc}}</td>
            <td>{{$service->price}}</td>
        </tr>

         @endforeach


    </tbody>
       </table>
        
     </div>
  </div>


