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
<section class="section empty">
    <div class="inner">
        <div class="section-title">
            <h2>Suppliers</h2>
        </div>

          @livewire('web.suppliers.filtered-suppliers', ['Suppliers' => $Suppliers])


    </div>
</section>




@endsection
