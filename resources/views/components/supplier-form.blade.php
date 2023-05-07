

@props(['actionRoute'=> "create-event" , "Supplier" => null , "cities" , "update" => false])

<form action="{{route($actionRoute)}}"  method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Supplier->id}}">
    @endif
    <div class="form-group mb-4">
    <label for="event-title">Name</label>
        <input name="name" id="event-title" value="{{$Supplier == null ? "":$Supplier->name}}" type="text" class="form-control"  placeholder="Name">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>
    <div class="form-group mb-4">
        <label for="event-title">Email</label>
            <input name="email" id="event-title" value="{{$Supplier == null ? "":$Supplier->email}}" type="text" class="form-control"  placeholder="Email">
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
    
        </div>   
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label">Upload Image </label>
                <input name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="event-title">Type</label>
                <input name="type" id="event-title" value="{{$Supplier == null ? "":$Supplier->type}}" type="text" class="form-control"  placeholder="type">
                @error('type')
                <p class="text-danger">{{$message}}</p>
                @enderror
        
            </div>
            
            <div class="form-group mb-4">
                <label for="event-title">Organization Name</label>
                    <input name="orgName" id="event-title" value="{{$Supplier == null ? "":$Supplier->orgName}}" type="text" class="form-control"  placeholder="Organization Name">
                    @error('orgName')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
            
                </div>  
      


     <div class="form-group">
     <label for="">Address</label>
        <div class="d-flex justify-content-between align-items-center event-times">
            <div class="w-md-100 w-50">
                <select name="city_id"  id="selectCity" class="form-select form-control" aria-label="Default select example" >
                    <option selected disabled>{{$Supplier == null ? "city":$Supplier->area->city->name}}</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                @error('area_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="w-md-100 w-50">
                <select name="area_id" id="areaSelect" class="form-select form-control" aria-label="Default select example" >
                <option value="" selected >{{$Supplier == null ? "Area":$Supplier->area->name}}</option>
                </select>

                @error('area_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
     </div>

     @if ($update == false)
     <div class="form-group mb-4">
         <label for="event-title">Password</label>
             <input name="password"  type="password" class="form-control"  placeholder="password">
             @error('password')
             <p class="text-danger">{{$message}}</p>
             @enderror
     
         </div>

         <div class="form-group mb-4">
             <label for="event-title">Confirm Password</label>
                 <input name="password_confirmation"  type="password" class="form-control"  placeholder="password">
                 @error('password_confirmation')
                 <p class="text-danger">{{$message}}</p>
                 @enderror
             </div>
     @endif

    <button type="submit" class="btn btn-primary mt-4">{{$update==null ? "Add" : "Update"}}</button>
</form>
