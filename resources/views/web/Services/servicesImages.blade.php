@extends('web.layout')

@section('nav')
<x-nav-auth></x-nav-auth>
@endsection


@section('main')
<section class="section empty">
    @livewire('web.services.update-images'  , ['Service' => $Service])
</section>
@endsection
