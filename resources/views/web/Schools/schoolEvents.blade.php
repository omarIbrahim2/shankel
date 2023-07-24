@extends('web.layout')

@section('title')
    Shankal | School Events
@endsection


@section('nav')
    <x-nav-auth></x-nav-auth>
@endsection



@section('main')
    <section class="section edit-teacher-profile empty">
        <div class="inner">
            <div class="container">
                <div class="events-section"   data-lang="{{trans('event.notifyEventStart')}}">

                @foreach ($Events as $event)
                   <livewire:web.schools.school-events :event="$event" :wire:key="$event->id">
                @endforeach
                </div>
            </div>


            <div class="pagination">
                {{ $Events->links('web.inc.pagination') }}
            </div>
        </div>
    </section>
@endsection


