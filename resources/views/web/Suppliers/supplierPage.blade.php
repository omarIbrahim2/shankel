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
    <!-- profie -->
    <section class="section edit-teacher-profile">
        <div class="inner">
            <div class="container">
                <form>
                    <div class="section-content">
                        <div class="row">
                            <div class=" col-md-5 col-12">
                                <div class="left-side teacher-left-side">

                                    <div class="teacher-avatar">
                                        <div class="avatar-container">
                                            <div class="avatar-img">
                                                <img width="100px" src="{{ asset($Supplier->image) }}" alt="avatar">
                                                <p><i class="fa-solid fa-location-dot"></i> {{ $Supplier->area->name }}</p>
                                            </div>
                                            <div class="avatar-data">
                                                <h4>
                                                    <a href="#">{{ $Supplier->name }}</a>
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
                                        <p >{{ $Supplier->type }}</p>
                                    </div>

                                    <div class="add-video">
                                        <div class="sub-title sec-sub-title teach-title">
                                            <h3>{{ trans('supplier.orgName') }}</h3>
                                        </div>
                                        <a >{{ $Supplier->orgName }}</a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-7  col-12">
                                <div class="right-side">
                                    <div class="row">
                                        <div class="avatar-data text-center">
                                            <h4 class="text-primary">
                                                {{ $Supplier->name }} {{ trans('supplier.services') }}
                                            </h4>
                                        </div>
                                        @foreach ($Supplier->services as $service)
                                        <div class=" col-md-6 col-12">
                                            <div class="teacher-service">
                                                <img src="{{ asset($service->image) }}" alt="service">
                                                <h4 class="text-primary">{{ trans('service.name') }}</h4>
                                                <p>{{ $service->name }}</p>
                                                <h4 class="text-primary">{{ trans('service.price') }}</h4>
                                                <p>{{ $service->price }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        <a href="{{ route('web-services') }}" class="btn-custom text-center ">{{ trans('supplier.watchNow') }}</a>
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
