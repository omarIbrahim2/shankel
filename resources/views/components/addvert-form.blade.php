@props(['actionRoute' => 'create-addvert', 'addvert' => null, 'update' => false])

<form action="{{ route($actionRoute) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{ $addvert->id }}">
    @endif
    <div class="form-group mb-4">
        <label for="addvert-title">{{ trans('addvert.title_en') }}</label>
        <input name="title_en" id="addvert-title" value="{{ $addvert == null ? old('title_en') : $addvert->title('en') }}" type="text"
            class="form-control" placeholder="{{ trans('addvert.title_en') }}">
        @error('title_en')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="addvert-title">{{ trans('addvert.title_ar') }}</label>
        <input name="title_ar" id="addvert-title" value="{{ $addvert == null ? old('title_ar') : $addvert->title('ar') }}" type="text"
            class="form-control" placeholder="{{ trans('addvert.title_ar') }}">
        @error('title_ar')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="addvert-desc-en">{{ trans('addvert.desc_en') }}</label>
        <textarea name="desc_en" id="addvert-desc-en" cols="30" placeholder="{{ trans('addvert.desc_en') }}" rows="10"
            class="form-control ">{!! $addvert == null ?  old('desc_en') : $addvert->desc('en') !!}</textarea>
        @error('desc_en')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="addvert-desc-ar">{{ trans('addvert.desc_ar') }}</label>
        <textarea name="desc_ar" id="addvert-desc-ar" cols="30" placeholder="{{ trans('addvert.desc_ar') }}" rows="10"
            class="form-control ">{!! $addvert == null ? old('desc_ar') : $addvert->desc('ar') !!}</textarea>
        @error('desc_ar')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="addvertImage" class="form-label">{{ trans('addvert.upload') }} </label>
            <input name="image" class="form-control py-2" id="addvertImage" type="file" accept="image/*">

            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            @if ($update == true)
                <img src="{{asset($addvert->image)}}" style="width: 60px" alt="addvert">
            @endif
        </div>


        @if ($update == true)
            <button type="submit" class="btn btn-primary mt-4">{{ trans('addvert.update') }}</button>
        @else
            <button type="submit" class="btn btn-primary mt-4">{{ trans('addvert.add') }}</button>
        @endif

</form>
