@extends('web.layout')

@section('nav')

    @custom_auth
        <x-nav-auth></x-nav-auth>
    @endcustom_auth

    @custom_guest
        <x-nav-guest />
    @endcustom_guest

@endsection

@section('main')
    @livewire('web.suppliers.all-suppliers')
@endsection
