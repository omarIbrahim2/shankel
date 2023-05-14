

@props(['actionRoute'=> "create-event" , "Supplier" => null , "cities" , "update" => false])

<form action="{{route($actionRoute)}}"  method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Supplier->id}}">
    @endif
    <div class="form-group mb-4">
    <label for="event-title">{{ trans('supplier.name') }}</label>
        <input name="name" id="event-title" value="{{$Supplier == null ? "":$Supplier->name}}" type="text" class="form-control"  placeholder="{{ trans('supplier.name') }}">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>
    <div class="form-group mb-4">
        <label for="event-title">{{ trans('supplier.email') }}</label>
            <input name="email" id="event-title" value="{{$Supplier == null ? "":$Supplier->email}}" type="text" class="form-control"  placeholder="{{ trans('supplier.email') }}">
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
    
        </div>   
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label">{{ trans('supplier.upload') }} </label>
                <input name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="event-title">{{ trans('supplier.type') }}</label>
                <input name="type" id="event-title" value="{{$Supplier == null ? "":$Supplier->type}}" type="text" class="form-control"  placeholder="{{ trans('supplier.type') }}">
                @error('type')
                <p class="text-danger">{{$message}}</p>
                @enderror
        
         </div>
            
            <div class="form-group mb-4">
                <label for="event-title">{{ trans('supplier.orgName') }}</label>
                    <input name="orgName" id="event-title" value="{{$Supplier == null ? "":$Supplier->orgName}}" type="text" class="form-control"  placeholder="{{ trans('supplier.orgName') }}">
                    @error('orgName')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
            
                </div>  
      


     <div class="form-group">
     <label for="">{{ trans('supplier.address') }}</label>
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
         <label for="event-title">{{ trans('supplier.password') }}</label>
             <input name="password"  type="password" class="form-control"  placeholder="{{ trans('supplier.password') }}">
             @error('password')
             <p class="text-danger">{{$message}}</p>
             @enderror
     
         </div>

         <div class="form-group mb-4">
             <label for="event-title">{{ trans('supplier.confirm_password') }}</label>
                 <input name="password_confirmation"  type="password" class="form-control"  placeholder="{{ trans('supplier.confirm_password') }}">
                 @error('password_confirmation')
                 <p class="text-danger">{{$message}}</p>
                 @enderror
             </div>
     @endif

    <button type="submit" class="btn btn-primary mt-4">{{$update==null ? trans('supplier.add') : trans('service.update')}}</button>
</form>
