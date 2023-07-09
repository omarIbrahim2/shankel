@extends('web.layout')

@section('title')
    Shankal | Area KGs
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection



@section('main')


    @livewire('web.suppliers.area-kgs')
     

@endsection