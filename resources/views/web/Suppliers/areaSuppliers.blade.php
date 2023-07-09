@extends('web.layout')

@section('title')
    Shankl | Area Suppliers
@endsection

@section('nav')
    <x-nav-auth></x-nav-auth>
@endsection

@section('main')

<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
           @livewire('web.suppliers.area-suppliers')
        </div>
    </div>
</section>

@endsection
