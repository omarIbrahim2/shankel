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
                                            <p class="tag rounded-pill btn-custom">{{$service->name}}</p>
                                            <p class="price">{{$service->price}} JOD</p>
                                        </div>
                                        <div class="service-item-title">

                                            <h3>{{$service->supplier->name}}</h3>
                                        </div>
                                        <div class="service-item-description">
                                            {{$service->desc}}
                                         </div>
                                    </div>
                                    @custom_auth

                                    @if ($service->added == true)
                                    <div class="service-booking">
                                        <form action="{{ route('remove-from-card') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                         <input type="hidden" value="{{ $service->id }}" name="service_id">
                                         <button type="submit"  class="btn-custom-danger">{{ trans('service.remove') }}</button>
                                        </form>
                                    </div>

                                    @else

                                    <div class="service-booking">
                                        <form action="{{ route('add-to-card') }}" method="post">
                                             @csrf
                                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                                            <div class="service-booking">
                                                <label for="">{{ trans('service.quantity') }}</label>
                                                @error('quantity')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <input id="" name="quantity" class="num_cart_item form-control mb-3" placeholder="0" type="number" min="0" max={{ $service->quantity }}>
                                            </div>

                                            <button type="submit" class="btn-custom">{{ trans('service.book') }}</button>
                                        </form>

                                    </div>

                                    @endif

                                   @endcustom_auth
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

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
