<div>
    <div class="section-content">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-5 col-12">
                <div class="left-side">
                    <div class="sub-title">
                        <h3>{{ trans('supplier.profile') }}</h3>
                    </div>
                    <div class="teacher-avatar rounded-0">

                        <img src="{{ $AuthUser->image }}" alt="avatar">
                        <h4>
                            <a href="#">{{ $AuthUser->name }}</a>
                        </h4>

                        <div class="avatar-btns">
                            @if ($image != null)
                                <p>{{ $image->getClientOriginalName() }}</p>
                            @endif
                            <div class="upload-avatar">
                                <input type="file" wire:model.defer="image" name="teacher-avatar"
                                    id="teacher-avatar">
                                <label class="btn-custom" for="teacher-avatar">{{ trans('supplier.uploadNew') }}</label>
                            </div>

                            @error('image')
                                {{ $message }}
                            @enderror
                            <div class="upload-avatar">
                                <button type="button" class="btn-custom" data-bs-toggle="modal"
                                    data-bs-target="#supplierAlbum">{{ trans('supplier.addService') }}</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7  col-12">
                <div class="right-side">
                    <div class="right-side-item">
                        <div class="sub-title main-sub-title">
                            <h3>{{ trans('supplier.info') }}</h3>
                            <div class="sub-btns">

                                <button wire:click="save" type="buttom"
                                    class="btn-custom">{{ trans('supplier.save') }}</button>
                                <a href="{{ route('change_pass_supplier') }}" class="btn-custom">
                                    {{ trans('supplier.reset') }}
                                </a>
                            </div>
                        </div>
                        <div class="contact-form ">
                            <div class="input-item">
                                <input type="text" wire:model="name" placeholder="{{ trans('supplier.name') }}">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-item">
                                <input type="email" wire:model="email" placeholder="{{ trans('supplier.email') }}">
                                <span>
                                    <i class="fa-regular fa-envelope"></i>
                                </span>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="input-item ">
                                <select wire:model="city" class="form-select" aria-label="Default select example">
                                    <option selected>{{ $authCity->name }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <span>
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                            </div>
                            <div class="input-item ">
                                <select wire:model="area_id" id="areaSelect" class="form-select"
                                    aria-label="Default select example">
                                    <option value="{{ $authArea->id }}" selected>{{ $authArea->name }}</option>
                                    @if ($Areas)

                                        @foreach ($Areas as $Area)
                                            <option value="{{ $Area->id }}">{{ $Area->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span>
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                @error('area_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-item">
                                <input type="text" wire:model="type" placeholder="{{ trans('supplier.type') }}">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-item">
                                <input type="text" wire:model="orgName"
                                    placeholder="{{ trans('supplier.orgName') }}">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                @error('orgName')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- supplier photos album --}}
        <!-- Modal -->
        <div class="modal fade" id="supplierAlbum" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header mb-5">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('supplier.addService') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @livewire('supplier.add-service-form')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
