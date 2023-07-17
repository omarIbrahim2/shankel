<div class="container p-2">

    <form wire:submit.prevent="save">

        <input type="hidden" wire:model="supplier_id" type="text">
        @error('supplier_id')
            <p>{{ $message }}</p>
        @enderror

        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-4">
                    <label class='font-bold' class='font-bold' for="event-title">{{ trans('service.name_en') }}</label>
                    <input wire:model.defer="name_en" id="event-title" value="{{ old('name_en') }}" type="text"
                        class="form-control" placeholder="{{ trans('service.name_en') }}">
                    @error('name_en')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-4">
                    <label class='font-bold' class='font-bold' for="event-title">{{ trans('service.name_ar') }}</label>
                    <input wire:model.defer="name_ar" id="event-title" value="{{ old('name_ar') }}" type="text"
                        class="form-control" placeholder="{{ trans('service.name_ar') }}">
                    @error('name_ar')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-4">
                    <label class='font-bold' for="event-title">{{ trans('service.quantity') }}</label>
                    <input wire:model.defer="quantity" id="event-title" value="{{ old('quantity') }}" type="number"
                        class="form-control" placeholder="{{ trans('service.quantity') }}">
                    @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-4">
                    <label class='font-bold' for="event-title">{{ trans('service.price') }}</label>
                    <input wire:model.defer="price" id="event-title" value="{{ old('price') }}" type="number"
                        class="form-control" placeholder="{{ trans('service.price') }}">
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div>
        </div>

        <div class="upload-avatar text-start">
            @if ($image != null)
                <p>{{ $image->getClientOriginalName() }}</p>
            @endif
            <label for="eventImage" class="btn-custom">{{ trans('teacher.uploadNew') }} </label>
            <input wire:model.defer="image" class="form-control py-2" id="eventImage" type="file" accept="image/*">

            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class='font-bold' for="event-desc_en">{{ trans('service.desc_en') }}</label>
            <textarea wire:model.defer="desc_en" id="event-desc-en" cols="30" placeholder="{{ trans('service.desc_en') }}"
                rows="10" class="form-control ">{{ old('desc_en') }}</textarea>
            @error('desc_en')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label class='font-bold' for="event-desc-ar">{{ trans('service.desc_ar') }}</label>
            <textarea wire:model.defer="desc_ar" id="event-desc-ar" cols="30" placeholder="{{ trans('service.desc_ar') }}"
                rows="10" class="form-control ">{{ old('desc_ar') }}</textarea>
            @error('desc_ar')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <button type="submit" class="btn-custom">{{ trans('service.add') }}</button>


    </form>

</div>
