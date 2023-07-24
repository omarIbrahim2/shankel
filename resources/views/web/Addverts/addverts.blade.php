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

<section class="section colored-section empty">
    <div class="inner">
        <div class="container">
            <div class="section-title">
                <h2>{{ trans('addvert.addverts') }}</h2>
            </div>
            @livewire('web.addverts.addverts')

        </div>
    </div>
</div>
</div>
</section>
<!-- ***************** -->

@endsection
