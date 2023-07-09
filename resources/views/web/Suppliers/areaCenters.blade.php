@extends('web.layout')

@section('title')
    Shankal | Area Centers
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection



@section('main')


    @livewire('web.suppliers.area-centers')
     

@endsection