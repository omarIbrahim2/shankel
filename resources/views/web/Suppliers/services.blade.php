@extends('web.layout')

@section('title')
    Shankl | Supplier Services
@endsection

@section('nav')
    <x-nav-auth></x-nav-auth>
@endsection

@section('main')

    @livewire('web.suppliers.supplier-services')

@endsection
