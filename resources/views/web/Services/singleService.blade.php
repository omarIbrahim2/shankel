@extends('web.layout')

@section('nav')

 @custom_auth
   <x-nav-auth></x-nav-auth>
 @endcustom_auth

 @custom_guest
   <x-nav-guest/>
 @endcustom_guest

@endsection



@section('main')

<main data-color="#AF62A6" data-image="{{ asset('assets/images/logo/nurs.png') }}">
    <!-- provider info -->
    <section class="section">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2 class="image-content">{{$Service->name()}}</h2>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="provider">
                                <div
                                    style="
                                        --swiper-navigation-color: #fff;
                                        --swiper-pagination-color: #fff;
                                    "
                                    class="swiper mySwiper2"
                                >
                                   @if ($Service->images)
                                   <div class="swiper-wrapper">
                                    @foreach ($Service->images as $image)
                                    <div class="swiper-slide">
                                        <img
                                            src="{{asset($image->image)}}"
                                            alt="Service Photo"
                                        />
                                    </div>
                                    @endforeach
                                </div>
                                   @endif
                               
                                </div>

                                @if ($Service->images)
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($Service->images as $image)
                                        <div class="swiper-slide">
                                            <img
                                                src="{{asset($image->image)}}"
                                                alt="Service Photo"
                                            />
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                               
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="detials-title">
                                <h3>{{$Service->name()}}</h3>
                            </div>
                            <div class="detials-descriton">
                                <p>
                                    {!!$Service->desc()!!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  

</main>

@endsection



