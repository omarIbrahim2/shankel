

@props(['actionRoute'=> "create-event" , "Event" => null , "cities" , "update" => false])

<form action="{{route($actionRoute)}}"  method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Event->id}}">
    @endif
    <div class="form-group mb-4">
    <label for="event-title">{{ trans('event.title') }}</label>
        <input name="title" id="event-title" value="{{$Event == null ? old('title'):$Event->title}}" type="text" class="form-control"  placeholder="{{ trans('event.title') }}">
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>
    <div class="form-group mb-4">
    <label for="event-desc">{{ trans('event.desc') }}</label>
        <textarea name="desc"  id="event-desc" cols="30" placeholder="description" rows="10" class="form-control ">{{$Event == null ? old('desc'):$Event->desc}}</textarea>
        @error('desc')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label">{{ trans('event.upload') }} </label>
                <input name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    <div class="form-group">
        <label for="">{{ trans('event.day') }} </label>
         <input type="text" value="{{$Event == null ? old('start_date'):$Event->start_date}}" name="start_date" id="" placeholder="{{ trans('event.select') }}"  class="form-control eventDayPicker">
         @error('start_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>

     <div class="form-group">
        <label for="">Event End Date </label>
         <input type="text" value="{{$Event == null ? old('end_date'):$Event->end_date}}" name="end_date" id="" placeholder="{{ trans('event.select') }}"  class="form-control eventDayPicker">
         @error('end_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>
      <div class="form-group ">
            <label for="">{{ trans('event.time') }}</label>
            <!-- this div to but two inputs -->
            <div class="d-flex justify-content-between align-items-center event-times">
                <div class="w-md-100 w-50">
                <input type="text" value="{{$Event == null ? old('start_time'):$Event->start_time}}" name="start_time" id="" placeholder="{{ trans('event.start') }}"  class="form-control eventTimePicker ">
                @error('start_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <div class="w-md-100 w-50">
                <input type="text" value="{{$Event == null ? old('end_time'):$Event->end_time}}" name="end_time" id="" placeholder="{{ trans('event.end') }}" class="form-control eventTimePicker ">
                @error('end_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            </div>
      </div>


     <div class="form-group">
     <label for="">{{ trans('event.address') }}</label>
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
     <button type="submit" class="btn btn-primary mt-4">{{ trans('event.update') }}</button>
     @else
     <button type="submit" class="btn btn-primary mt-4">{{ trans('event.add') }}</button>
     @endif
   
</form>
