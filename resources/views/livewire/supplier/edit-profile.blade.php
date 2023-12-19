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
                            <a href="#">{{ $AuthUser->name() }}</a>
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
                                <a href="{{route('supplier-service-create' , $AuthUser->id)}}" class="btn-custom"
                                >{{ trans('supplier.addService') }}</a>
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
                                <input type="text" wire:model="name_en" placeholder="{{ trans('supplier.name_en') }}">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                @error('name_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-item">
                                <input type="text" wire:model="name_ar" placeholder="{{ trans('supplier.name_ar') }}">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                @error('name_ar')
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
                                    <option selected>{{ $authCity->name() }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name() }}</option>
                                    @endforeach
                                </select>
                                <span>
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                            </div>
                            <div class="input-item ">
                                <select wire:model="area_id" id="areaSelect" class="form-select"
                                    aria-label="Default select example">
                                    <option value="{{ $authArea->id }}" selected>{{ $authArea->name() }}</option>
                                    @if ($Areas)

                                        @foreach ($Areas as $Area)
                                            <option value="{{ $Area->id }}">{{ $Area->name() }}</option>
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
                                <input type="text" wire:model="type_en" placeholder="{{ trans('supplier.type_en') }}">
                                <span>
                                    <svg class="svg-inline--fa fa-truck" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M368 0C394.5 0 416 21.49 416 48V96H466.7C483.7 96 499.1 102.7 512 114.7L589.3 192C601.3 204 608 220.3 608 237.3V352C625.7 352 640 366.3 640 384C640 401.7 625.7 416 608 416H576C576 469 533 512 480 512C426.1 512 384 469 384 416H256C256 469 213 512 160 512C106.1 512 64 469 64 416H48C21.49 416 0 394.5 0 368V48C0 21.49 21.49 0 48 0H368zM416 160V256H544V237.3L466.7 160H416zM160 368C133.5 368 112 389.5 112 416C112 442.5 133.5 464 160 464C186.5 464 208 442.5 208 416C208 389.5 186.5 368 160 368zM480 464C506.5 464 528 442.5 528 416C528 389.5 506.5 368 480 368C453.5 368 432 389.5 432 416C432 442.5 453.5 464 480 464z"></path></svg><!-- <i class="fa-solid fa-truck"></i> Font Awesome fontawesome.com -->
                                </span>
                                @error('type_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-item">
                                <input type="text" wire:model="type_ar" placeholder="{{ trans('supplier.type_ar') }}">
                                <span>
                                    <svg class="svg-inline--fa fa-truck" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M368 0C394.5 0 416 21.49 416 48V96H466.7C483.7 96 499.1 102.7 512 114.7L589.3 192C601.3 204 608 220.3 608 237.3V352C625.7 352 640 366.3 640 384C640 401.7 625.7 416 608 416H576C576 469 533 512 480 512C426.1 512 384 469 384 416H256C256 469 213 512 160 512C106.1 512 64 469 64 416H48C21.49 416 0 394.5 0 368V48C0 21.49 21.49 0 48 0H368zM416 160V256H544V237.3L466.7 160H416zM160 368C133.5 368 112 389.5 112 416C112 442.5 133.5 464 160 464C186.5 464 208 442.5 208 416C208 389.5 186.5 368 160 368zM480 464C506.5 464 528 442.5 528 416C528 389.5 506.5 368 480 368C453.5 368 432 389.5 432 416C432 442.5 453.5 464 480 464z"></path></svg><!-- <i class="fa-solid fa-truck"></i> Font Awesome fontawesome.com -->
                                </span>
                                @error('type_ar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-item">
                                <input type="text" wire:model="orgName_en"
                                    placeholder="{{ trans('supplier.orgName_en') }}">
                                    <span>
                                        <svg class="svg-inline--fa fa-sitemap" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sitemap" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M208 80C208 53.49 229.5 32 256 32H320C346.5 32 368 53.49 368 80V144C368 170.5 346.5 192 320 192H312V232H464C494.9 232 520 257.1 520 288V320H528C554.5 320 576 341.5 576 368V432C576 458.5 554.5 480 528 480H464C437.5 480 416 458.5 416 432V368C416 341.5 437.5 320 464 320H472V288C472 283.6 468.4 280 464 280H312V320H320C346.5 320 368 341.5 368 368V432C368 458.5 346.5 480 320 480H256C229.5 480 208 458.5 208 432V368C208 341.5 229.5 320 256 320H264V280H112C107.6 280 104 283.6 104 288V320H112C138.5 320 160 341.5 160 368V432C160 458.5 138.5 480 112 480H48C21.49 480 0 458.5 0 432V368C0 341.5 21.49 320 48 320H56V288C56 257.1 81.07 232 112 232H264V192H256C229.5 192 208 170.5 208 144V80z"></path></svg><!-- <i class="fa-solid fa-sitemap"></i> Font Awesome fontawesome.com -->
                                    </span>
                                @error('orgName_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-item">
                                <input type="text" wire:model="orgName_ar"
                                    placeholder="{{ trans('supplier.orgName_ar') }}">
                                    <span>
                                        <svg class="svg-inline--fa fa-sitemap" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sitemap" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M208 80C208 53.49 229.5 32 256 32H320C346.5 32 368 53.49 368 80V144C368 170.5 346.5 192 320 192H312V232H464C494.9 232 520 257.1 520 288V320H528C554.5 320 576 341.5 576 368V432C576 458.5 554.5 480 528 480H464C437.5 480 416 458.5 416 432V368C416 341.5 437.5 320 464 320H472V288C472 283.6 468.4 280 464 280H312V320H320C346.5 320 368 341.5 368 368V432C368 458.5 346.5 480 320 480H256C229.5 480 208 458.5 208 432V368C208 341.5 229.5 320 256 320H264V280H112C107.6 280 104 283.6 104 288V320H112C138.5 320 160 341.5 160 368V432C160 458.5 138.5 480 112 480H48C21.49 480 0 458.5 0 432V368C0 341.5 21.49 320 48 320H56V288C56 257.1 81.07 232 112 232H264V192H256C229.5 192 208 170.5 208 144V80z"></path></svg><!-- <i class="fa-solid fa-sitemap"></i> Font Awesome fontawesome.com -->
                                    </span>
                                @error('orgName_ar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</div>
</div>
