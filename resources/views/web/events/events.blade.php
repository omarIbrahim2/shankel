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

<section class="section">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>{{ trans('nav.Events') }}</h2>
            </div>

            @livewire('web.events.events')

            <div class="pagination">
                {{ $Events->links('web.inc.pagination') }}
            </div>
        </div>
    </div>
</section>
<!-- ***************** -->


@endsection
