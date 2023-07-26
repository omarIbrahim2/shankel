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

  <div class="container vh-100">
     
    <div class="d-flex justify-content-center">
        
         <div>
            <h3>404 NOT FOUND</h3>
         </div>

    </div>

  </div>
    
@endsection