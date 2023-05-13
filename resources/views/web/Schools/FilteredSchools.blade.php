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
       
          @livewire('web.schools.filtered-schools', ['Schools' => $Schools])
       
     
    </div>
</section>    

 


@endsection