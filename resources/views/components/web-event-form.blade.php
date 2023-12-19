@props(['actionRoute' => 'create-event', 'Event' => null, 'cities', 'update' => false])


<form action="{{route($actionRoute)}}"  method="POST"  enctype="multipart/form-data">
    @csrf


    @if ($update == true)
        <input name="id" hidden type="text" value="{{ $Event->id }}">
    @endif
    <div class="input-item me-auto ms-0">
        <input name="title_en" id="event-title"  value="{{ $Event == null ? old('title_en') : $Event->title('en') }}" type="text" placeholder="{{ trans('event.title_en') }}"/>
        <span>
            <i class="fa-regular fa-calendar"></i>
        </span>
        @error('title_en')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>                                                         


    <div class="input-item me-auto ms-0">
        <input name="title_ar" id="event-title_ar"  type="text"  value="{{ $Event == null ? old('title_ar') : $Event->title('ar') }}"   placeholder="{{ trans('event.title_ar') }}"/>
        <span>
            <i class="fa-regular fa-calendar"></i>
        </span>
        @error('title_ar')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="input-item me-auto ms-0">
        <textarea id="desc_en" name="desc_en"   class="event_desc" placeholder="{{trans("event.desc_en")}}" rows="5" >{{ $Event == null ? old('desc_en') : $Event->desc('en') }}</textarea>
        <span>
            <i class="fa-solid fa-quote-right"></i>
        </span>
        @error('desc_en')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>



    <div class="input-item me-auto ms-0">
        <textarea name="desc_ar"  id="desc_ar" class="event_desc" placeholder="{{trans('event.desc_ar')}}" rows="5" > {{ $Event == null ? old('desc_ar') : $Event->desc('ar') }}</textarea>
        <span>
            <i class="fa-solid fa-quote-right"></i>
        </span>
        @error('desc_ar')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

        <p id="imgName"></p>
        <div class="upload-avatar text-start"  data-upload-id="myFirstImage">
            <label for="eventImage" class="btn-custom">{{ trans('event.upload') }} </label>
            <input  name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
         
        @if ($update == true)
            <img src="{{asset($Event->image)}}" style="width: 60px" alt="event image">
        @endif

    <div class="input-item me-auto ms-0">
         <input type="text" value="{{ $Event == null ? old('start_date') : $Event->start_date }}" name="start_date"  placeholder="{{ trans('event.select') }}"  class="textbox-n eventDayPicker"/>
         <span>
            <i class="fa-regular fa-calendar-days"></i>
        </span>
         @error('start_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>

     <div class="input-item me-auto ms-0">
         <input type="text" value="{{ $Event == null ? old('end_date') : $Event->end_date }}"  name="end_date" id="basicFlatpickr" placeholder="{{ trans('event.select') }}"  class="textbox-n eventDayPicker"/>
         <span>
            <i class="fa-regular fa-calendar-days"></i>
        </span>
         @error('end_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>
            <!-- this div to but two inputs -->
                <div class="input-item me-auto ms-0">
                <input type="text" name="start_time"   value="{{ $Event == null ? old('start_time') : $Event->start_time }}" placeholder="{{ trans('event.start') }}"  class="textbox-n-time eventTimePicker ">
                <span>
                    <i class="fa-regular fa-clock"></i>
                </span>
                @error('start_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <div class="input-item me-auto ms-0">
                <input type="text" value="{{ $Event == null ? old('end_time') : $Event->end_time }}"  name="end_time"  placeholder="{{ trans('event.end') }}" class="textbox-n-time eventTimePicker ">
                <span>
                    <i class="fa-regular fa-clock"></i>
                </span>
                @error('end_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>

                <div class="input-item me-auto ms-0">
                    <select id="selectCity" class="form-select" aria-label="Default select example" >
                        <option  selected disabled>{{ $Event == null ? trans('event.city') : $Event->area->city->name() }}</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name()}}</option>
                    @endforeach

                      </select>
                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                </div>
                <div class="input-item me-auto ms-0">
                    <select name="area_id" id="areaSelect" class="form-select" aria-label="Default select example" >
                        <option  value="{{ $Event == null ? 'Area' : $Event->area_id }}"    selected> {{ $Event == null ?  trans('event.area') : $Event->area->name() }}</option>
                      </select>
                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                    @error('area_id')
                     <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>


   @if ($update == true)
   <div class="input-item me-auto ms-0">
    <button type="submit" class="custom-out-btn">
        {{ trans('event.update') }}
    </button>
    </div>
   @else
   <div class="input-item me-auto ms-0">
    <button type="submit" class="custom-out-btn">
        {{ trans('event.add') }}
    </button>
    </div>
   @endif
   
</form>