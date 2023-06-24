@extends('web.layout')

@section('title')
    Shankal | Public Lessons
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection



@section('main')

    @livewire('web.teachers.public-lessons')
     
@endsection