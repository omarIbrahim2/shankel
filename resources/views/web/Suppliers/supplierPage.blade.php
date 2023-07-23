@extends('web.layout')

@section('nav')

@custom_auth
<x-nav-auth></x-nav-auth>
@endcustom_auth

@custom_guest
<x-nav-guest />
@endcustom_guest

@endsection

@section('main')
<section class="teacher-banner">

</section>
<!-- profie -->
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
            <form>
                <div class="section-content">
                    <div class="row">
                        <div class=" col-lg-5 col-12">
                            <div class="left-side teacher-left-side">

                                <div class="teacher-avatar">
                                    <div class="avatar-container">
                                        <div class="avatar-img">
                                            <img width="100px" src="{{ asset($Supplier->image) }}" alt="avatar">
                                            <p><i class="fa-solid fa-location-dot"></i> {{ $Supplier->area->name() }}
                                            </p>
                                        </div>
                                        <div class="avatar-data">
                                            <h4>
                                                <a href="#">{{ $Supplier->name() }}</a>
                                            </h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="add-video">
                                    <div class="sub-title sec-sub-title teach-title">
                                        <h3>{{ trans('supplier.email') }}</h3>
                                    </div>
                                    <a href="mailto:elmassar@gmail.com">{{ $Supplier->email }}</a>
                                </div>

                                <div class="add-video">
                                    <div class="sub-title sec-sub-title teach-title">
                                        <h3>{{ trans('supplier.type') }}</h3>
                                    </div>
                                    <p>{{ $Supplier->type() }}</p>
                                </div>

                                <div class="add-video">
                                    <div class="sub-title sec-sub-title teach-title">
                                        <h3>{{ trans('supplier.orgName') }}</h3>
                                    </div>
                                    <a>{{ $Supplier->orgName() }}</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="right-side">
                                <div class="row">
                                    @foreach ($Supplier->services as $service)
                                    <div class=" col-md-6 col-12">
                                        <div class="teacher-service card supplier_service_card">
                                            <img class="card-img-top" src="{{ asset($service->image) }}" alt="service">
                                            <div class="card-body">
                                                <p class="card-title fw-bold supplier-service-name">
                                                   <a href="{{route('web-service' , $service->id)}}"> {{ $service->name() }}</a></p>
                
                                                <p class="card-title fw-bold">{{ $service->price }} JOD</p>
                                            </div>
                                            <div class="avatar-btns">

                                                <div>
                                                    <!-- <a href="{{ route('web-services') }}"
                                                        class="btn-custom text-center ">{{ trans('supplier.addToCart') }}</a> -->
                                                    <div>
                                                        <div class="service-booking">
                                                            <form action="{{ route('add-to-card') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="service_id"
                                                                    value="{{ $service->id }}">

                                                                <div class="srv-cont">
                                                                <a href="{{ route('web-services') }}"
                                                        class="btn-custom text-center ">{{ trans('supplier.addToCart') }}</a>
                                                                    <div class="service-booking">

                                                                        <input name="quantity"
                                                                            class="num_cart_item form-control"
                                                                            placeholder="0" type="number">
                                                                    </div>


                                                                </div>
                                                            </form>
                                                            @error('quantity')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="avatar-btns">

                                        <div class="services-watch">
                                            <a href="{{ route('web-services') }}"
                                                class="btn-custom text-center ">{{ trans('supplier.watchNow') }}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- ***************** -->
@endsection
