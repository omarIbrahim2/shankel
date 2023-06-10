

<form wire:submit.prevent="save">

    
    <input wire:model="eventable_id" hidden type="text">
    @error('eventable_id')
        <p>{{ $message }}</p>
    @enderror
    
    <div class="form-group mb-4">
    <label for="event-title">{{ trans('event.title') }}</label>
        <input wire:model="title" id="event-title"  type="text" class="form-control"  placeholder="{{ trans('event.title') }}">
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>
    <div class="form-group mb-4">
    <label for="event-desc">{{ trans('event.desc') }}</label>
        <textarea wire:model="desc"  id="event-desc" cols="30" placeholder="description" rows="10" class="form-control "></textarea>
        @error('desc')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label">{{ trans('event.upload') }} </label>
                <input wire:model="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    <div class="form-group">
        <label for="">{{ trans('event.day') }} </label>
         <input type="text"  wire:model="start_date" id="" placeholder="{{ trans('event.select') }}"  class="form-control eventDayPicker">
         @error('start_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>

     <div class="form-group">
        <label for="">{{ trans('event.day') }} </label>
         <input type="text" wire:model="end_date" id="" placeholder="{{ trans('event.select') }}"  class="form-control eventDayPicker">
         @error('end_date')
         <p class="text-danger">{{$message}}</p>
         @enderror
     </div>
      <div class="form-group ">
            <label for="">{{ trans('event.time') }}</label>
            <!-- this div to but two inputs -->
            <div class="d-flex justify-content-between align-items-center event-times">
                <div class="w-md-100 w-50">
                <input type="text" wire:model="start_time" id="" placeholder="{{ trans('event.start') }}"  class="form-control eventTimePicker ">
                @error('start_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                <div class="w-md-100 w-50">
                <input type="text"  wire:model="end_time" id="" placeholder="{{ trans('event.end') }}" class="form-control eventTimePicker ">
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
                <select wire:model="city_id"  id="selectCity" class="form-select form-control" aria-label="Default select example" >
                    <option selected disabled>City</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                @error('area_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="w-md-100 w-50">
                <select wire:model="area_id" id="areaSelect" class="form-select form-control" aria-label="Default select example" >
                <option  selected >Area</option>
                </select>

                @error('area_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
     </div>
      

     <button type="submit" class="btn btn-primary mt-4">{{ trans('event.add') }}</button>
   
</form>
