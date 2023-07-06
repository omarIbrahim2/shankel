<div class="contact-form black-contact-form">
<form wire:submit.prevent="save">

    
    <input wire:model="eventable_id" hidden type="text">
    @error('eventable_id')
        <p>{{ $message }}</p>
    @enderror
    
    
    <div class="input-item me-auto ms-0">
        <input wire:model="title" id="event-title"  type="text"   placeholder="{{ trans('event.title') }}">
        <span>
            <i class="fa-regular fa-calendar"></i>
        </span>
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="input-item me-auto ms-0">
        <textarea wire:model="desc"  id="event-desc" class="event_desc" placeholder="description" rows="5" ></textarea>
        <span>
            <i class="fa-solid fa-quote-right"></i>
        </span>
        @error('desc')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
        <div class="upload-avatar text-start" data-upload-id="myFirstImage">
            <label for="eventImage" class="btn-custom">{{ trans('event.upload') }} </label>
            <input wire:model="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    <div class="input-item me-auto ms-0">
         <input type="text"  wire:model="start_date" id="" placeholder="{{ trans('event.select') }}"  class="textbox-n eventDayPicker">
         <span>
            <i class="fa-regular fa-calendar-days"></i>
        </span>
         @error('start_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>

     <div class="input-item me-auto ms-0">
         <input type="text" wire:model="end_date" id="" placeholder="{{ trans('event.select') }}"  class="textbox-n eventDayPicker">
         <span>
            <i class="fa-regular fa-calendar-days"></i>
        </span>
         @error('end_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>
            <!-- this div to but two inputs -->
                <div class="input-item me-auto ms-0">
                <input type="text" wire:model="start_time" id="" placeholder="{{ trans('event.start') }}"  class="textbox-n-time eventTimePicker ">
                <span>
                    <i class="fa-regular fa-clock"></i>
                </span>
                @error('start_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <div class="input-item me-auto ms-0">
                <input type="text"  wire:model="end_time" id="" placeholder="{{ trans('event.end') }}" class="textbox-n-time eventTimePicker ">
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
                    <option value="{{$city->id}}">{{$city->name}}</option>
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
                    <select wire:model="area_id" id="areaSelect" class="form-select" aria-label="Default select example" >
                        <option  selected>{{ trans('event.area') }}</option>
                        @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
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
        <button type="submit" class="custom-out-btn">
            {{ trans('event.add') }}
        </button>
    </div>
</form>
</div>