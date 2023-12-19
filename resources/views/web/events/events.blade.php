@extends('web.layout')

@section('nav')

@custom_auth

<x-nav-auth></x-nav-auth>
@endcustom_auth


@custom_guest
<x-nav-guest/>
@endcustom_guest
@endsection


@section('main')

<section class="section empty">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>{{ trans('nav.Events') }}</h2>
            </div>

            <div class="events-section" data-lang="{{trans('event.notifyEventStart')}}" data-endLang="{{trans('event.notifyEventEnd')}}">
            @foreach ($Events as $event)

              {{-- @livewire('web.events.events') --}}

              <livewire:web.events.events :event="$event" :wire:key="$event->id">
            @endforeach


          </div>

            <div class="pagination">
                {{ $Events->links('web.inc.pagination') }}
            </div>
        </div>
    </div>
</section>
<!-- ***************** -->


@endsection
