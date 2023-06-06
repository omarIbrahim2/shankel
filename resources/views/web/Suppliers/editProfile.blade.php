@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection



@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
            @livewire('supplier.edit-profile')
        </div>
    </div>
</section>

@endsection

