@extends('web.layout')

@section('title')
    Shankal | Reserved Events
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection



@section('main')

<section class="section empty">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>{{ trans('event.reservedEvents') }}</h2>
            </div>
            <div class="events-section"  data-lang="{{trans('event.notifyEventStart')}}" data-endLang="{{trans('event.notifyEventEnd')}}">

                @foreach ($Events as $event)

                   <livewire:web.events.reserved-events :event="$event" :wire:key="$event->id">
                @endforeach

            </div>

            <div class="pagination">
                {{ $Events->links('web.inc.pagination') }}
            </div>

        </div>
    </div>
</section>


@endsection
