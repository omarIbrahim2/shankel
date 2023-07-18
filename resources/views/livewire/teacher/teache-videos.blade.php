<div class="container">
     <h4>{{trans('teacher.addLesson')}} </h4>
    <form  wire:submit.prevent="save">   
        @csrf 
        <div class="input-item me-auto ms-0">
            <input wire:model.defer="title_en" id="event-title"  type="text"  value="{{old('title_en')}}" placeholder="{{trans('teacher.title_en')}}">
            <span>
                <i class="fa-solid fa-person-chalkboard"></i>
            </span>
            @error('title_en')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="input-item me-auto ms-0">
            <input wire:model.defer="title_ar" id="event-title"  type="text"  value="{{old('title_ar')}}" placeholder="{{trans('teacher.title_ar')}}">
            <span>
                <i class="fa-solid fa-person-chalkboard"></i>
            </span>
            @error('title_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="input-item me-auto ms-0">
            <input wire:model.defer="url" id="event-title"  type="text"  value="{{old('url')}}" placeholder="{{trans('teacher.url')}}">
            <span>
                <i class="fa-solid fa-person-chalkboard"></i>
            </span>
            @error('url')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
     
            <div class="upload-avatar text-start" data-upload-id="myFirstImage">

                @if ($image)
                <p>{{$image->getClientOriginalName()}}</p>  
                @endif
                <label for="eventImage" class="btn-custom">{{ trans('teacher.uploadNew') }} </label>
                <input wire:model.defer="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">
    
                @error('image')
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
