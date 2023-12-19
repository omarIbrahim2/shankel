@extends('web.layout')

@section('title')
    Shankal | Parent Profile
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection


@section('main')


    @livewire('web.parents.reserved-schools')
     

@endsection