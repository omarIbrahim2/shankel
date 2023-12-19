@props(['actionRoute' => 'create-event', 'Supplier' => null, 'cities', 'update' => false])

<form action="{{ route($actionRoute) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{ $Supplier->id }}">
    @endif
    <div class="form-group mb-4">
        <label for="event-title">{{ trans('supplier.name_en') }}</label>
        <input name="name_en" id="event-title" value="{{ $Supplier == null ? '' : $Supplier->name('en') }}" type="text"
            class="form-control" placeholder="{{ trans('supplier.name_en') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-title">{{ trans('supplier.name_ar') }}</label>
        <input name="name_ar" id="event-title" value="{{ $Supplier == null ? '' : $Supplier->name('ar') }}" type="text"
            class="form-control" placeholder="{{ trans('supplier.name_ar') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-title">{{ trans('supplier.email') }}</label>
        <input name="email" id="event-title" value="{{ $Supplier == null ? '' : $Supplier->email }}" type="text"
            class="form-control" placeholder="{{ trans('supplier.email') }}">
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label">{{ trans('supplier.upload') }} </label>
            <input name="image" class="form-control py-2" id="eventImage" type="file" accept="image/*">

            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            @if ($Supplier != null)
                <img src="{{asset($Supplier->image)}}" style="width: 60px" alt="Suppplier Image">
            @endif
        </div>
        <div class="form-group mb-4">
            <label for="event-title">{{ trans('supplier.type_en') }}</label>
            <input name="type_en" id="event-title" value="{{ $Supplier == null ? '' : $Supplier->type('en') }}"
                type="text" class="form-control" placeholder="{{ trans('supplier.type_en') }}">
            @error('type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="event-title">{{ trans('supplier.type_ar') }}</label>
            <input name="type_ar" id="event-title" value="{{ $Supplier == null ? '' : $Supplier->type('ar') }}"
                type="text" class="form-control" placeholder="{{ trans('supplier.type_ar') }}">
            @error('type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="event-title">{{ trans('supplier.orgName_en') }}</label>
            <input name="orgName_en" id="event-title" value="{{ $Supplier == null ? '' : $Supplier->orgName('en') }}"
                type="text" class="form-control" placeholder="{{ trans('supplier.orgName_en') }}">
            @error('orgName')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="event-title">{{ trans('supplier.orgName_ar') }}</label>
            <input name="orgName_ar" id="event-title" value="{{ $Supplier == null ? '' : $Supplier->orgName('ar') }}"
                type="text" class="form-control" placeholder="{{ trans('supplier.orgName_ar') }}">
            @error('orgName')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-group">
            <label for="">{{ trans('supplier.address') }}</label>
            <div class="d-flex justify-content-between align-items-center event-times">
                <div class="w-md-100 w-50">
                    <select  id="selectCity" class="form-select form-control"
                        aria-label="Default select example">
                        <option value=" {{$Supplier == null ? 'City' : $Supplier->area->city->id}}" selected disabled> {{$Supplier == null ? 'City' : $Supplier->area->city->name()}}
                        </option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name() }}</option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-md-100 w-50">
                    <select name="area_id" id="areaSelect" class="form-select form-control"
                        aria-label="Default select example">
                        <option value="{{$Supplier == null ? '' : $Supplier->area_id}}" selected>{{$Supplier == null ? 'Area' : $Supplier->area->name()}}
                        </option>
                    </select>

                    @error('area_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        @if ($update == false)
            <div class="form-group mb-4">
                <label for="event-title">{{ trans('supplier.password') }}</label>
                <input name="password" type="password" class="form-control"
                    placeholder="{{ trans('supplier.password') }}">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group mb-4">
                <label for="event-title">{{ trans('supplier.confirm_password') }}</label>
                <input name="password_confirmation" type="password" class="form-control"
                    placeholder="{{ trans('supplier.confirm_password') }}">
                @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        @endif

        <button type="submit"
            class="btn btn-primary mt-4">{{ $update == null ? trans('supplier.add') : trans('service.update') }}</button>
</form>
