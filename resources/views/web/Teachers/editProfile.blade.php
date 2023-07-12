@extends('web.layout')

@section('nav')
<x-nav-auth></x-nav-auth>
@endsection




@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">

            @livewire('teacher.edit-teacher', ['authUser' => $authUser])
            
        </div>
    </div>
</section>

@endsection