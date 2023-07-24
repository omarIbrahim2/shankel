@extends('web.layout')

@section('title')
    Shankal | Students
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection

@section('main')
<section class="section edit-teacher-profile empty">
    <div class="inner">
        <div class="container">
           @livewire('web.schools.students')
        </div>
    </div>
</section>
@endsection
