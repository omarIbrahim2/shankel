@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection


@section('main')
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
            <div class="contact-form black-contact-form">
                <form action="{{route("school-store-event")}}"  method="POST"  enctype="multipart/form-data">   
                    @csrf 
                    <div class="input-item me-auto ms-0">
                        <input name="title" id="event-title"  type="text"  value="{{old('title')}}" placeholder="{{ trans('event.title') }}">
                        <span>
                            <i class="fa-regular fa-calendar"></i>
                        </span>
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-item me-auto ms-0">
                        <textarea name="desc"  id="event-desc" class="event_desc" placeholder="description" rows="5" >{{old('desc')}}</textarea>
                        <span>
                            <i class="fa-solid fa-quote-right"></i>
                        </span>
                        @error('desc')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                        <div class="upload-avatar text-start" data-upload-id="myFirstImage">
                            <label for="eventImage" class="btn-custom">{{ trans('event.upload') }} </label>
                            <input name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">
                
                            @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    <div class="input-item me-auto ms-0">
                         <input type="text" value="{{old('start_date')}}" name="start_date" id="" placeholder="{{ trans('event.select') }}"  class="textbox-n eventDayPicker">
                         <span>
                            <i class="fa-regular fa-calendar-days"></i>
                        </span>
                         @error('start_date')
                         <p class="text-danger">{{$message}}</p>
                         @enderror
                     </div>
                
                     <div class="input-item me-auto ms-0">
                         <input type="text" value="{{old('end_date')}}" name="end_date" id="basicFlatpickr" placeholder="{{ trans('event.select') }}"  class="textbox-n eventDayPicker">
                         <span>
                            <i class="fa-regular fa-calendar-days"></i>
                        </span>
                         @error('end_date')
                         <p class="text-danger">{{$message}}</p>
                         @enderror
                     </div>
                            <!-- this div to but two inputs -->
                                <div class="input-item me-auto ms-0">
                                <input type="text" name="start_time" id="" value="{{old('start_time')}}" placeholder="{{ trans('event.start') }}"  class="textbox-n-time eventTimePicker ">
                                <span>
                                    <i class="fa-regular fa-clock"></i>
                                </span>
                                @error('start_time')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="input-item me-auto ms-0">
                                <input type="text" value="{{old('end_time')}}"  name="end_time" id="" placeholder="{{ trans('event.end') }}" class="textbox-n-time eventTimePicker ">
                                <span>
                                    <i class="fa-regular fa-clock"></i>
                                </span>
                                @error('end_time')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                
                                <div class="input-item me-auto ms-0">
                                    <select id="selectCity" class="form-select" aria-label="Default select example" name="edu_systems_id" >
                                        <option selected disabled>{{ trans('event.city') }}</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name()}}</option>
                                    @endforeach
                                        
                                      </select>
                                    <span>
                                        <i class="fa-solid fa-location-dot"></i>
                                    </span>
                                    @error('area_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                <div class="input-item me-auto ms-0">
                                    <select name="area_id" id="areaSelect" class="form-select" aria-label="Default select example" >
                                        <option  selected>{{ trans('event.area') }}</option>
                                      </select>
                                    <span>
                                        <i class="fa-solid fa-location-dot"></i>
                                    </span>
                                    @error('area_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                     
                      
                
                     <div class="input-item me-auto ms-0">
                        <button type="submit" class="custom-out-btn">
                            {{ trans('event.add') }}
                        </button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $("#selectCity").on('change', function() {
            let cityId = this.value;
            var url = '{{ route('areas', ':id') }}';
            url = url.replace(':id', cityId);

            $.ajax({
                type: 'GET',

                url: url,

                processData: false,

                contentType: 'application/json',

                cache: false,

                success: function(data) {
                    var your_html = "";
                    $("#areaSelect").empty();
                    $("#areaSelect").append("<option selected disabled>Area</option>");
                    for (const key in data.areas) {


                        your_html += "<option id='ar' value = " + data.areas[key].id + ">" + data.areas[
                            key].name + "</option>";
                    }
                    $("#areaSelect").append(your_html);

                }

            })

        })
    </script>

@endsection