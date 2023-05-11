

@props(['actionRoute'=> "create-event" , "Event" => null , "cities" , "update" => false])

<form action="{{route($actionRoute)}}"  method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Event->id}}">
    @endif
    <div class="form-group mb-4">
    <label for="event-title">Title</label>
        <input name="title" id="event-title" value="{{$Event == null ? "":$Event->title}}" type="text" class="form-control"  placeholder="title">
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>
    <div class="form-group mb-4">
    <label for="event-desc">Description</label>
        <textarea name="desc"  id="event-desc" cols="30" placeholder="description" rows="10" class="form-control ">{{$Event == null ? "":$Event->desc}}</textarea>
        @error('desc')
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
        <div class="form-group">
        <label for="">Event Day</label>
         <input type="text" value="{{$Event == null ? "":$Event->start}}" name="start" id="" placeholder="Select Event Day"  class="form-control eventDayPicker">
         @error('start')
         <p class="text-danger">{{$message}}</p>
         @enderror
      </div>
      <div class="form-group ">
            <label for="">Event Time</label>
            <!-- this div to but two inputs -->
            <div class="d-flex justify-content-between align-items-center event-times">
                <div class="w-md-100 w-50">
                <input type="text" value="{{$Event == null ? "":$Event->start_at}}" name="start_at" id="" placeholder="start date"  class="form-control eventTimePicker ">
                @error('start_at')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <div class="w-md-100 w-50">
                <input type="text" value="{{$Event == null ? "":$Event->end_at}}" name="end_at" id="" placeholder="end date" class="form-control eventTimePicker ">
                @error('end_at')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            </div>
      </div>


     <div class="form-group">
     <label for="">Address</label>
        <div class="d-flex justify-content-between align-items-center event-times">
            <div class="w-md-100 w-50">
                <select name="city_id"  id="selectCity" class="form-select form-control" aria-label="Default select example" >
                    <option selected disabled>{{$Event == null ? "city":$Event->area->city->name}}</option>
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
                <option value="{{$Event == null ? "Area":$Event->area_id}}" selected >{{$Event == null ? "Area":$Event->area->name}}</option>
                </select>

                @error('area_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
     </div>
      
     @if ($update == true)
     <button type="submit" class="btn btn-primary mt-4">Update</button>
     @else
     <button type="submit" class="btn btn-primary mt-4">Add</button>
     @endif
   
</form>
