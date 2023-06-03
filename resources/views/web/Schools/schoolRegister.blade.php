@extends('web.layout')

@section('title')
    Shankl | School Register
@endsection

@section('nav')
    <x-nav-auth></x-nav-auth>
@endsection


@section('main')
<section class="section ">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="left-side">
                        <div class="section-title">
                            <h2 class="text-center">Book a seat</h2>
                        </div>
                        <div class="contact-form black-contact-form">
                            <form action="{{route("paypal-payment")}}" method="POST">
                                @csrf
                                <div class="input-item me-auto ms-0">
                                    <select name="child_id" placeholder="Choose Your Child">
                                        <option selected disabled aria-hidden="true">Choose Your Child</option>
                                        @foreach ($Parent->children as $child )
                                           <option  value="{{$child->id}}">{{$child->name}}</option>
                                        @endforeach
                                        
                                        
                                        
                                      </select>
                                      
                                    <span>
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </span>
                                     @error('child_id')
                                        <p class="text-danger">{{$message}}</p>
                                     @enderror
                                </div>
                               
                                <div class="input-item me-auto ms-0">
                                    <input value="{{$School->id}}" type="hidden" name="school_id">
                                    <select name="grade_id" id="selectEduSystem" class="form-select" aria-label="Default select example" >
                                        <option  selected disabled>Choose Grade </option>
                                        @foreach ($School->grades as $grade)
                                             <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach  
                                      </select>
                                    <span>
                                        <i class="fa-solid fa-location-dot"></i>
                                    </span>
                                    @error('grade_id')
                                        <p class="text-danger">{{$message}}</p>
                                     @enderror
                                </div>
                           
                                
                                {{-- <div class="input-item me-auto ms-0">
                                    <button type="submit" class="custom-out-btn">
                                        Send Request
                                    </button>
                                </div> --}}
                               <div class="input-item me-auto ms-0">
                                <p class="text-start">Booking Fees 20 JOD</p>
                                <button type="submit" class="payment-button">
                                    <img src="{{asset("assets")}}/images/payments/pay.png" alt="payment">
                                    <span><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg><!-- <i class="fa-solid fa-chevron-right"></i> Font Awesome fontawesome.com --></span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-12">
                    <div class="auth-logo">
                        <img src="{{asset("assets")}}/images/logo/Shanklbig.png" alt="shankal">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection