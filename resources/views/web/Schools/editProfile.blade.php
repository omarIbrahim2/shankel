@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection



@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
           @livewire('school.edit-school-profile' , [ 'eSystems' => $eSystems , 'Cities' => $Cities])
        </div>
    </div>
</section>

@endsection



