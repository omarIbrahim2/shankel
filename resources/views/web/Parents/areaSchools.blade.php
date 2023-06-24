@extends('web.layout')

@section('title')
    Shankal | Area Schools
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection



@section('main')


    @livewire('web.parents.area-schools')
     

@endsection