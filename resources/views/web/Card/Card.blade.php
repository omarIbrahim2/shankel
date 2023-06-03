@extends('web.layout')

@section('nav')

@custom_auth

<x-nav-auth></x-nav-auth>
@endcustom_auth


@section('main')

<section class="section">
    <div class="inner">
        <div class="container">
            <div class="services-container">

                @foreach ($Services as $service)
                <div class="service-item">
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="service-item-img">
                                <img src="{{ asset($service->image) }}" alt="service">
                            </div>
                        </div>
                        <div class="col-md-10 col-12">
                            <div class="service-item-data">
                                <div class="service-text">
                                    <div class="tags">
                                        <a href="#" class="tag rounded-pill btn-custom">{{ $service->name}}</a>
                                        <a href="#" class="price">{{ $service->price }}</a>
                                    </div>
                                    <div class="service-item-title">
                                        <h3>{{ $service->name }}</h3>
                                    </div>
                                    <div class="service-item-description">
                                        {{ $service->desc }}
                                    </div>
                                </div>
                                <div class="service-booking">
                                    <a href="#" class="btn-custom">Order Now</a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                @endforeach
             
            </div>
        </div>
    </div>
</section>

<x-footer></x-footer>
@endsection