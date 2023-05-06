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
<section class="section">
    <div class="inner">
        <div class="section-title">
            <h2>School</h2>
        </div>
        <div class="service-banner school-banner">
            <div class="page-search">
                <input type="text" class="search-input" placeholder="Search">
                <span><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        </div>

        @livewire('web.schools.schools')
        {{-- <div class="section-content section">
            <div class="container">
                <div class="area-container ">
                    
                    <div class="area-content">
                        <div class="row">

                            <div class="col-md-4 col-12 search-resault">
                                <a href="#">
                                    <div class="area-school school-card">
                                        <div class="area-school-img">
                                            <img src="assets/images/school/1.webp" alt="school">
                                        </div>
                                        <div class="area-school-name search-label">
                                            <h4>Jordan National School</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- <div class="pagination">
            <ul>
                <li><a href="#">previous</a></li>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">next</a></li>
            </ul>
        </div> -->
    </div>
</section>    

 


@endsection