@props(['actionRoute'=> "create-slider" , "Slider" => null  ,  "update" =>false])


<form action="{{ route($actionRoute) }}"  method="POST" enctype="multipart/form-data">


    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Slider == null ? "":$Slider->id}}">
        @error("id")
           <p>{{$message}}</p>
        @enderror
    @endif


    <div class="form-group mb-4">
    <label for="event-title">Title</label>
        <input name="title_en" id="event-title" value="{{$Slider == null ? old('title_en'): $Slider->title('en')}}" type="text" class="form-control"  placeholder="title">
        @error('title_en')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-title">العنوان</label>
            <input name="title_ar" id="event-title" value="{{$Slider == null ? old('title_ar'):$Slider->title('ar')}}" type="text" class="form-control"  placeholder="العنوان">
            @error('title_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-desc">Info</label>
            <textarea name="info_en"  id="info-en" cols="30" placeholder="info" rows="10" class="form-control ">{!!$Slider == null ? old('info_en'):$Slider->info('en')!!}</textarea>
            @error('info_en')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="form-group mb-4">
            <label for="event-desc">المحتوي</label>
                <textarea name="info_ar"  id="info-ar" cols="30" placeholder="المحتوي" rows="10" class="form-control ">{!!$Slider == null ? old('info_ar'):$Slider->info('ar')!!}</textarea>
                @error('info_ar')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label"> upload Image</label>
                <input name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror

            @if ($update==true)
                <img src="{{asset($Slider->image)}}" style="width: 60px" alt="slider image">
            @endif
        </div>
    </div>


            @if ($update == false)
            <button type="submit" class="btn btn-primary mt-4">Add</button>
            @else
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            @endif
            
            <a href="{{route('Sliders')}}" class="btn btn-primary mt-4">Back</a>

</form>
