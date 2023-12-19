@extends('web.layout')

@section('title')
    Shankal | Reserved Events
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection



@section('main')

    @livewire('web.events.reserved-events')
     
@endsection