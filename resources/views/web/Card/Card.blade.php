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

                <form>
                    <button type="submit" class="payment-button">
                        <img src="{{asset("assets")}}/images/payments/pay.png" alt="payment">
                        <span><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg><!-- <i class="fa-solid fa-chevron-right"></i> Font Awesome fontawesome.com --></span>
                    </button>
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
                                    {{-- <a href="#" class="btn-custom">Order Now</a> --}}
                                    <label for="">Quantity</label>
                                    <input id="" class="num_cart_item form-control" placeholder="0" type="number" min="0" max={{ $service->quantity }}>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                @endforeach
                
                </form>
             
            </div>
        </div>
    </div>
</section>

<x-footer></x-footer>
@endsection