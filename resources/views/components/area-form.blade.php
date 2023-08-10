@props(['actionRoute'=> "area-create" , "Area" => null , 'City' => null  ,  "update" =>false])


<form action="{{ route($actionRoute) }}"  method="POST" enctype="multipart/form-data">


    @csrf
  
    @if ($update == true)
        <input name="id"  type="hidden" value="{{$Area == null ? "":$Area->id}}">
        @error("id")
           <p>{{$message}}</p>
        @enderror
    @endif

     <input name="city_id" type="hidden" value="{{$City == null ? '' : $City->id}}">
    <div class="form-group mb-4">
    <label for="event-name">name</label>
        <input name="name_en" id="event-name" value="{{$Area == null ? old('name_en'): $Area->name("en")}}" type="text" class="form-control"  placeholder="name">
        @error('name_en')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-name">اسم المنطقة</label>
            <input name="name_ar" id="event-name" value="{{$Area == null ? old('name_ar'):$Area->name("ar")}}" type="text" class="form-control"  placeholder="اسم المنطقة">
            @error('name_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror
    
    </div>
    

    
            @if ($update == false)
            <button type="submit" class="btn btn-primary mt-4">Add</button>
            @else
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            @endif
            
            
            <a href="{{route('city-show-areas' , $City->id)}}" class="btn btn-primary mt-4">Back</a>
            
</form>