<div>
    <section class="section">
        <div class="inner">
            <div class="container">
                <div class="services-container">
                    @foreach ($Services as $service)
                    <div class="service-item">
                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="service-item-img">
                                    <img src="{{asset($service->image)}}" alt="service">
                                </div>
                            </div>
                            <div class="col-md-10 col-12">
                                <div class="service-item-data">
                                    <div class="service-text">
                                        <div class="tags">
                                            <a href="#" class="tag rounded-pill btn-custom">{{$service->name()}}</a>
                                            <a href="#" class="price">{{$service->price}} JOD</a>
                                        </div>
                                        <div class="service-item-title">

                                            <h3>{{$service->supplier->name()}}</h3>
                                        </div>
                                        <div class="service-item-description">
                                            {{$service->desc()}}
                                         </div>
                                    </div>
                                    <div class="service-booking">
                                        <div class="m-2">
                                            <form action="{{route('supplier-service-delete' , $service->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class=" px-4 btn btn-danger">{{ trans('teacher.delete') }}</button>
                                            </form>
                                        </div>
                                        <button type="button" class="get btn btn-warning" data-service-id="{{$service->id}}" data-ser-descen="{{$service->desc('en')}}"  data-ser-namear="{{$service->name('ar')}}"  data-ser-nameen="{{$service->name('en')}}" data-ser-descar="{{$service->desc('ar')}}" data-price="{{$service->price}}" data-quatntity="{{$service->quantity}}"    data-bs-toggle="modal" data-bs-target="#supplierAlbum">{{trans('teacher.update')}}</button>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                    @endforeach

                    <div class="modal fade" id="supplierAlbum" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header mb-5">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('supplierUpdateServ') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="container p-2">

                                <form action="{{route('supplier-service-update')}}"  method="POST" enctype="multipart/form-data">
                                      @csrf
                                    <input type="hidden" id="serId" name="id" type="text">
                                    @error('id')
                                        <p>{{ $message }}</p>
                                    @enderror
                            
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label class='font-bold' class='font-bold' for="serNameEn">{{ trans('service.name_en') }}</label>
                                                <input name="name_en" id="serNameEn" value="{{ old('name_en') }}" type="text"
                                                    class="form-control" placeholder="{{ trans('service.name_en') }}">
                                                @error('name_en')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                            
                                            </div>
                                        </div>
                            
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label class='font-bold' class='font-bold' for="serNameAr">{{ trans('service.name_ar') }}</label>
                                                <input name="name_ar" id="serNameAr" value="{{ old('name_ar') }}" type="text"
                                                    class="form-control" placeholder="{{ trans('service.name_ar') }}">
                                                @error('name_ar')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                            
                                            </div>
                                        </div>
                            
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label class='font-bold' for="serQuantity">{{ trans('service.quantity') }}</label>
                                                <input name="quantity" id="serQuantity" value="{{ old('quantity') }}" type="number"
                                                    class="form-control" placeholder="{{ trans('service.quantity') }}">
                                                @error('quantity')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                            
                                            </div>
                                        </div>
                            
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label class='font-bold' for="serPrice">{{ trans('service.price') }}</label>
                                                <input name="price" id="serPrice" value="{{ old('price') }}" type="number"
                                                    class="form-control" placeholder="{{ trans('service.price') }}">
                                                @error('price')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                            
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="upload-avatar text-start">
                                        <label for="eventImage" class="btn-custom">{{ trans('teacher.uploadNew') }} </label>
                                        <input name="image" class="form-control py-2" id="eventImage" type="file" accept="image/*">
                            
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <img src="" style="width: 50px" alt="">
                                    </div>
                            
                                    <div class="form-group mb-4">
                                        <label class='font-bold' for="event-desc_en">{{ trans('service.desc_en') }}</label>
                                        <textarea name="desc_en" id="event-desc-en" cols="30" placeholder="{{ trans('service.desc_en') }}"
                                            rows="10" class="form-control ">{{ old('desc_en') }}</textarea>
                                        @error('desc_en')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                            
                                    <div class="form-group mb-4">
                                        <label class='font-bold' for="event-desc-ar">{{ trans('service.desc_ar') }}</label>
                                        <textarea name="desc_ar" id="event-desc-ar" cols="30" placeholder="{{ trans('service.desc_ar') }}"
                                            rows="10" class="form-control ">{{ old('desc_ar') }}</textarea>
                                        @error('desc_ar')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                            
                            
                                    <button type="submit" class="btn-custom">{{ trans('service.add') }}</button>
                            
                            
                                </form>
                            
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            <div class="pagination">
                @if ($Services == null)

                @else
                @if ($Services->links("livewire.web-pagination"))
                {{$Services->links("livewire.web-pagination")}}
                @endif
                @endif
            </div>
        </div>
    </section>
</div>
