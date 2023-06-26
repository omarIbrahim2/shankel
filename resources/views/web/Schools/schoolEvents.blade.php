@extends('web.layout')

@section('title')
    Shankal | School Events
@endsection


@section('nav')
    <x-nav-auth></x-nav-auth>
@endsection



@section('main')
    <section class="section edit-teacher-profile">
        <div class="inner">
            <div class="container">
                @livewire('web.schools.school-events')
            </div>
        </div>
    </section>
@endsection
