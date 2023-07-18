@props(['actionRoute' => 'create-addvert', 'addvert' => null, 'update' => false])

<form action="{{ route($actionRoute) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{ $addvert->id }}">
    @endif
    <div class="form-group mb-4">
        <label for="addvert-title">{{ trans('addvert.title_en') }}</label>
        <input name="title_en" id="addvert-title" value="{{ $addvert == null ? '' : $addvert->title('en') }}" type="text"
            class="form-control" placeholder="{{ trans('addvert.title_en') }}">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="addvert-title">{{ trans('addvert.title_ar') }}</label>
        <input name="title_ar" id="addvert-title" value="{{ $addvert == null ? '' : $addvert->title('ar') }}" type="text"
            class="form-control" placeholder="{{ trans('addvert.title_ar') }}">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="addvert-desc-en">{{ trans('addvert.desc_en') }}</label>
        <textarea name="desc_en" id="addvert-desc-en" cols="30" placeholder="{{ trans('addvert.desc_en') }}" rows="10"
            class="form-control ">{{ $addvert == null ? '' : $addvert->desc('en') }}</textarea>
        @error('desc')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="addvert-desc-ar">{{ trans('addvert.desc_ar') }}</label>
        <textarea name="desc_ar" id="addvert-desc-ar" cols="30" placeholder="{{ trans('addvert.desc_ar') }}" rows="10"
            class="form-control ">{{ $addvert == null ? '' : $addvert->desc('ar') }}</textarea>
        @error('desc')
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
        </div>


        @if ($update == true)
            <button type="submit" class="btn btn-primary mt-4">{{ trans('addvert.update') }}</button>
        @else
            <button type="submit" class="btn btn-primary mt-4">{{ trans('addvert.add') }}</button>
        @endif

</form>
