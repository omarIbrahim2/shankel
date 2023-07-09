@extends('web.layout')

@section('nav')   
    <x-nav-auth></x-nav-auth>
@endsection

@section('main')
    @livewire('web.suppliers.area-teachers')
@endsection
