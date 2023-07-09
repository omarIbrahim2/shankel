

@props(['actionRoute'=> "create-addvert" , "addvert" => null , "update" => false])

<form action="{{route($actionRoute)}}"  method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$addvert->id}}">
    @endif
    <div class="form-group mb-4">
    <label for="addvert-title">{{ trans('addvert.title') }}</label>
        <input name="title" id="addvert-title" value="{{$addvert == null ? '":$addvert->title}}" type="text" class="form-control"  placeholder="{{ trans('addvert.title') }}">
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>
    <div class="form-group mb-4">
    <label for="addvert-desc">{{ trans('addvert.desc') }}</label>
        <textarea name="desc"  id="addvert-desc" cols="30" placeholder="{{ trans('addvert.desc') }}" rows="10" class="form-control ">{{$addvert == null ? "":$addvert->desc}}</textarea>
        @error('desc')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="addvertImage" class="form-label">{{ trans('addvert.upload') }} </label>
                <input name="image" class="form-control py-2" id="addvertImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>


     @if ($update == true)
     <button type="submit" class="btn btn-primary mt-4">{{ trans('addvert.update') }}</button>
     @else
     <button type="submit" class="btn btn-primary mt-4">{{ trans('addvert.add') }}</button>
     @endif

</form>
