@extends('web.layout')

@section('title')
    Shankal | Area Suppliers
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection

@section('main')
<section class="section edit-teacher-profile empty">
    <div class="inner">
        <div class="container">
           @livewire('web.schools.area-suppliers')
        </div>
    </div>
</section>
@endsection
