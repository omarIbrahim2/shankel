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
            <h2>Schools</h2>
        </div>
        <div class="service-banner school-banner">
            <div class="page-search">
                <input type="text" class="search-input" placeholder="Search">
                <span><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        </div>

        @livewire('web.schools.schools')
     
    </div>
</section>    

 


@endsection