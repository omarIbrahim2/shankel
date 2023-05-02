

@props(['actionRoute'=> "create-event" , "Event" => null , "cities" , "update" => false])

<form action="{{route($actionRoute)}}"  method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Event->id}}">
    @endif
    <div class="form-group mb-4">
        <input name="title" value="{{$Event == null ? "":$Event->title}}" type="text" class="form-control"  placeholder="title">
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror
    
    </div>
    <div class="form-group mb-4">
        <textarea name="desc"  id="" cols="30" placeholder="description" rows="10">{{$Event == null ? "":$Event->desc}}</textarea>
        @error('desc')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-file-container" data-upload-id="myFirstImage">
            <label>Upload Image </label>
            <label class="custom-file-container__custom-file" >
                <input name="image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
             
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

      <div class="form-group">
        <label for="">Start date</label>
         <input type="datetime-local" value="{{$Event == null ? "":$Event->start_at}}" name="start_at" id="" placeholder="start date">  
         @error('start_at')
         <p class="text-danger">{{$message}}</p>
         @enderror
      </div>
      <div class="form-group">
        <label for="">End date</label>
        <input type="datetime-local" value="{{$Event == null ? "":$Event->end_at}}" name="end_at" id="" placeholder="end date">  
        @error('end_at')
        <p class="text-danger">{{$message}}</p>
        @enderror
     </div>
     
     <div class="form-group">
        <select  id="selectCity" class="form-select" aria-label="Default select example" >

            <option selected disabled>{{$Event == null ? "city":$Event->area->city->name}}</option>
            @foreach ($cities as $city)
               <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
            
          </select>
     </div>

     <div class="form-group">
        <select name="area_id" id="areaSelect" class="form-select" aria-label="Default select example" >
            <option value="{{$Event == null ? "Area":$Event->area_id}}" selected >{{$Event == null ? "Area":$Event->area->name}}</option>
          </select>

          @error('area_id')
          <p class="text-danger">{{$message}}</p>
          @enderror
     </div>


        
    </div>
    
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
