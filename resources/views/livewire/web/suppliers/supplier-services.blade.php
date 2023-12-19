
    <section class="section empty">
        <div class="inner">
            <div class="container">
                <div class="services-container">

                    <div class="service-item">
                        <div class="row">
                            @foreach ($Services as $service)
                            <div class=" col-md-4 col-12">
                                <div class="teacher-item-wrapper">
                                <div class="teacher-service card supplier_service_card">
                                    <img class="card-img-top" src="{{ asset($service->image) }}" alt="service">
                                    <div class="card-body">
                                        <p class="card-title fw-bold supplier-service-name">
                                            <a href="{{route('web-service' , $service->id)}}">
                                                {{$service->supplier->name()}}</a>
                                        </p>

                                        <p class="card-title fw-bold">{{$service->price}} JOD</p>
                                    </div>
                                    <div class="avatar-btns">

                                        @if (!Auth::guard('supplier')->check())

                                        @custom_auth

                                        @if ($service->added == true)

                                        <div class="service-booking">
                                            <form action="{{route('remove-from-card')}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{ $service->id }}" name="service_id">
                                                <button type="submit"
                                                    class="btn-custom-danger">{{ trans('service.remove') }}</button>
                                            </form>
                                        </div>


                                        @else

                                        <div class="service-card-parent">
                                            <form action="{{ route('add-to-card') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                <div class="service-booking">

                                                    <button type="submit"
                                                        class="btn-custom">{{ trans('service.book') }}</button>
                                                    <input name="quantity" class="num_cart_item form-control mb-3"
                                                        placeholder="0" type="number" min="0">

                                                </div>
                                                @error('quantity')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror

                                            </form>

                                        </div>


                                        @endif

                                        @endcustom_auth
                                        @endif


                                    </div>
                                    <div class="service-booking my-service-btn">
                                        <div class="m-2">
                                            <form action="{{route('supplier-service-delete' , $service->id)}}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class=" px-4 btn btn-danger">{{ trans('teacher.delete') }}</button>
                                            </form>
                                        </div>
                                        <a href="{{route('supplier-service-edit' , ['serviceId' => $service->id , 'supplierId' => $service->supplier->id])}}"
                                            class="get btn btn-warning">{{trans('teacher.update')}}</a>
                                    </div>
                                </div>
                                </div>
                            </div>

                            @endforeach
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
