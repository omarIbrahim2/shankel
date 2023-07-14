@props(['actionRoute' => 'create-event', 'Service' => null, 'supplierId' => 0, 'update' => false])

<form action="{{ route($actionRoute) }}" method="POST" enctype="multipart/form-data">


    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{ $Service == null ? '' : $Service->id }}">
        @error('id')
            <p>{{ $message }}</p>
        @enderror
    @endif


    <input type="hidden" name="supplier_id" type="text" value="{{ $supplierId }}">
    @error('supplier_id')
        <p>{{ $message }}</p>
    @enderror

    <div class="form-group mb-4">
        <label for="event-title">{{ trans('service.name_en') }}</label>
        <input name="name_en" id="event-title" value="{{ $Service == null ? '' : $Service->name('en') }}" type="text"
            class="form-control" placeholder="{{ trans('service.name_en') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-title">{{ trans('service.name_ar') }}</label>
        <input name="name_ar" id="event-title" value="{{ $Service == null ? '' : $Service->name('ar') }}" type="text"
            class="form-control" placeholder="{{ trans('service.name_ar') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-desc">{{ trans('service.desc_en') }}</label>
        <textarea name="desc_en" id="event-desc" cols="30" placeholder="{{ trans('service.desc_en') }}" rows="10"
            class="form-control ">{{ $Service == null ? '' : $Service->desc('en') }}</textarea>
        @error('desc')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-desc">{{ trans('service.desc_ar') }}</label>
        <textarea name="desc_ar" id="event-desc" cols="30" placeholder="{{ trans('service.desc_ar') }}" rows="10"
            class="form-control ">{{ $Service == null ? '' : $Service->desc('ar') }}</textarea>
        @error('desc')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-title">{{ trans('service.quantity') }}</label>
        <input name="quantity" id="event-title" value="{{ $Service == null ? '' : $Service->quantity }}" type="number"
            class="form-control" placeholder="{{ trans('service.quantity') }}">
        @error('quantity')
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>

    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label">{{ trans('service.upload') }} </label>
            <input name="image" class="form-control py-2" id="eventImage" type="file" accept="image/*">

            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="event-title">{{ trans('service.price') }}</label>
        <input name="price" id="event-title" value="{{ $Service == null ? '' : $Service->price }}" type="number"
            class="form-control" placeholder="{{ trans('service.price') }}">
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>

    @if ($update == false)
        <button type="submit" class="btn btn-primary mt-4">{{ trans('service.update') }}</button>
    @else
        <button type="submit" class="btn btn-primary mt-4">{{ trans('service.add') }}</button>
    @endif

</form>
