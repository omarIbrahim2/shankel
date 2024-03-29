@props(['actionRoute'=> "city-create" , "City" => null  ,  "update" =>false])


<form action="{{ route($actionRoute) }}"  method="POST" enctype="multipart/form-data">


    @csrf
  
    @if ($update == true)
        <input name="id" hidden type="text" value="{{$City == null ? "":$City->id}}">
        @error("id")
           <p>{{$message}}</p>
        @enderror
    @endif

    
    <div class="form-group mb-4">
    <label for="event-name">name</label>
        <input name="name_en" id="event-name" value="{{$City == null ? old('name_en'): $City->name('en')}}" type="text" class="form-control"  placeholder="name">
        @error('name_en')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-name">اسم المدينة</label>
            <input name="name_ar" id="event-name" value="{{$City == null ? old('name_ar'):$City->name("ar")}}" type="text" class="form-control"  placeholder="اسم المدينة">
            @error('name_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror
    
    </div>
    

    
            @if ($update == false)
            <button type="submit" class="btn btn-primary mt-4">Add</button>
            @else
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            @endif
            
</form>