@props(['actionRoute' => 'create-slider', 'gallery' => null, 'update' => false])


<form action="{{ route($actionRoute) }}" method="POST" enctype="multipart/form-data">


    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{ $gallery == null ? '' : $gallery->id }}">
        @error('id')
            <p>{{ $message }}</p>
        @enderror
    @endif


    <div class="form-group mb-4">
        <label for="event-title">Title</label>
        <input name="title_en" id="event-title" 
            value="{{ $gallery == null ? old('title_en') : $gallery->title('en') }}"
            type="text" class="form-control" placeholder="Title">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-title">عنوان الصورة</label>
        <input name="title_ar" id="event-title" 
            value="{{ $gallery == null ? old('title_ar') : $gallery->title('ar') }}"
            type="text" class="form-control" placeholder="عنوان الصورة">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>

    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label"> upload Image</label>
            <input name="image" class="form-control py-2" id="eventImage" type="file" accept="image/*">

            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            @if ($update == true)
              
            <img src="{{asset($gallery->image)}}" style="width: 50px" alt="gallery">
                
            @endif
        </div>
    </div>


    @if ($update == false)
        <button type="submit" class="btn btn-primary mt-4">Add</button>
    @else
        <button type="submit" class="btn btn-primary mt-4">Update</button>
    @endif
    
    <a href="{{route('gallery')}}" class="btn btn-primary mt-4">Back</a>

</form>
