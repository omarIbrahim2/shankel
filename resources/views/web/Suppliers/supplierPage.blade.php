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
    
<main data-color="#AF62A6" >
    <!-- Supplier info -->
    <section class="section">
        <div class="inner">
            <div class="container">
               
                <a class="btn btn-primary" href="{{route("Services" , $Supplier->id)}}">All Services</a>
                          
                <div class="section-title">
                    <h2 class="image-content">{{$Supplier->name}}
                    </h2>
                   
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
                                        @foreach ($Supplier->images as $image)
                                        <div class="swiper-slide">
                                            <img
                                                src="{{asset('uploads/'.$image->name)}}"
                                                alt="nurs"
                                            />
                                        </div>
                                        @endforeach
                                     
                                    </div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    @foreach ($Supplier->images as $image)
                                    <div class="swiper-slide">
                                        <img
                                            src="{{asset("uploads/".$image->name)}}"
                                            alt="nurs"
                                        />
                                    </div>
                                    @endforeach
                                </div>



                             @custom_auth
                                <div class="revews">

                                     @livewire('web.comments.comments' , ["supplier_id" => $Supplier->id])
                                    {{-- <div class="reviews-item">
                                        <div class="review-head">
                                            <h5>hussien</h5>
                                        </div>
                                        <div class="review-body">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        </div>
                                    </div>
                                 
                                    <div class="add-review">
                                        <input type="text" placeholder="leave comment" name="review">												
                                    </div>
                                    <button class="btn btn-primary">comment</button> --}}

                                </div>
                               @endcustom_auth 
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12">
                            
                            <div class="detials-title">
                                <h3>{{$Supplier->name}}</h3>
                            </div>
                            <div class="detials-descriton">
                                <p>
                                    {{$Supplier->orgName}}
                                </p>
                            </div>
                            <div class="detials-items">
                                
                                <div class="detials-item">
                                    <span>
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </span>
                                    <span> +96579{{$Supplier->phone}} </span>
                                </div>
                                
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- *************** -->

</main>
 
@endsection

@section('scripts')
    <script>
        $(".comment").on("click",function(){

            let comment = $(this).attr("data-comment");

            let commentId = $(this).attr("data-commentId");


             $("#editcomment").val(comment)

             $("#editcommentId").val(commentId)
        })
    </script>
@endsection