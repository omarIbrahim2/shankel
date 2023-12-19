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
                @auth("parent")
                  <a class="btn btn-primary" href="{{route('register-form-school' , $School->id)}}">{{ trans('school.bookSeat') }}</a>
                @endauth
                <div class="section-title">
                    <h2 class="image-content">{{$School->name()}}</h2>
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
                                    <div class="swiper-wrapper">
                                        @foreach ($School->images as $image)
                                        <div class="swiper-slide">
                                            <img
                                                src="{{asset('uploads/'.$image->name)}}"
                                                alt="School Photo" class="single-images-school"
                                            />
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($School->images as $image)
                                        <div class="swiper-slide">
                                            <img
                                                src="{{asset('uploads/'.$image->name)}}"
                                                alt="School Photo" class="single-images-school"
                                            />
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @custom_auth
                                <div class="revews">

                                     @livewire('web.comments.comments' , ["school_id" => $School->id])

                                </div>
                                @endcustom_auth
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="detials-title">
                                <h3>{{$School->name()}}</h3>
                            </div>
                            <div class="detials-descriton">
                                <p>
                                    @if($School->desc)
                                    {!!$School->desc()!!}
                                    @endif
                                </p>
                            </div>
                            <div class="detials-items">
                                <div class="detials-item">
                                    <span>
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </span>
                                    <span> {{ trans('school.openAt') }} {{\Carbon\Carbon::createFromFormat('Y-m-d' , $School->establish_date)->format("d F Y")}} </span>
                                </div>
                                <div class="detials-item">
                                    <span>
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </span>
                                    <span> +96579{{$School->phone}} </span>
                                </div>
                                <div class="detials-item">
                                    <span>
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </span>
                                    <span> {{$Es->name()}} </span>
                                </div>

                            </div>
                            <div class="prov-socials">
                                @if ($School->facebook)
                                <div>
                                    <a href="{{$School->facebook}}"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                                @endif
                                @if ($School->twitter)
                                <div>
                                    <a href="{{$School->twitter}}"><i class="fa-brands fa-twitter"></i></a>

                                </div>
                                @endif
                               @if ($School->linkedin)
                               <div>
                                <a href="{{$school->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a>
                               </div>
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- *************** -->
    <!-- mission and vision -->
    <section class="section colored-section">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2 class="image-content">{{ trans('school.missAndVis') }}</h2>
                </div>
                <div class="section-content">
                    <div class="mission-vision">
                        <h3>{{ trans('school.mission') }}:</h3>
                        <p>
                            {!!$School->mission == null ? "" : $School->mission()!!}
                        </p>
                    </div>
                    <div class="mission-vision">
                        <h3>{{ trans('school.vision') }}:</h3>
                        <p>
                            {!!$School->vision == null ? "" : $School->vision()!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection

@section('scripts')

    {{-- <script>

// window.addEventListener('comment-added', event => {


//     $("#editcomment").val(event.detail.commentInfo)
//     $("#editcommentId").val(event.detail.commentId)
// })


    </script> --}}
    {{-- <script>
        $(".comment").on("click",function(){

            let comment = $(this).attr("data-comment");

            let commentId = $(this).attr("data-commentId");


             $("#editcomment").val(comment)

             $("#editcommentId").val(commentId)
        })
    </script> --}}
@endsection
