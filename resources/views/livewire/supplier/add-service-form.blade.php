<div class="container p-2">

<form wire:submit.prevent="save">

    <input type="hidden" wire:model="supplier_id" type="text">
    @error('supplier_id')
        <p>{{ $message }}</p>
    @enderror

    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-4">
                <label class='font-bold' class='font-bold' for="event-title">{{ trans('service.name') }}</label>
                <input  wire:model="name" id="event-title" value="{{ old("name") }}"  type="text"
                    class="form-control" placeholder="{{ trans('service.name') }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-4">
                <label class='font-bold' for="event-title">{{ trans('service.quantity') }}</label>
                <input wire:model="quantity" id="event-title" value="{{ old('quantity') }}" type="number" class="form-control"  placeholder="{{ trans('service.name') }}">
                    @error('quantity')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
            
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-4">
                <label class='font-bold' for="event-title">{{ trans('service.price') }}</label>
                <input wire:model="price" id="event-title" value="{{ old('price') }}" type="number"
                    class="form-control" placeholder="{{ trans('service.price') }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="avatar-btns">
                @if ($image != null)
                    <p>{{ $image->getClientOriginalName() }}</p>
                @endif
                <div class="upload-avatar">
                    <input type="file" wire:model.defer="image" id="teacher-avatar">
                    <label class="btn-custom" for="teacher-avatar">{{ trans('supplier.uploadNew') }}</label>
                </div>
    
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-group mb-4">
        <label class='font-bold' for="event-desc">{{ trans('service.desc') }}</label>
        <textarea wire:model="desc" id="event-desc" cols="30" placeholder="{{ trans('service.desc') }}" rows="10"
            class="form-control ">{{ old("desc") }}</textarea>
        @error('desc')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>




        <button type="submit" class="btn-custom">{{ trans('service.add') }}</button>


</form>

</div>
