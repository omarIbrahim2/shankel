@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection


@section('main')
<section class="section edit-teacher-profile empty">
    <div class="inner">
        <div class="container">
              <div class="m-auto">
                  <h2>{{ trans('service.addImage') }}</h2>
              </div>


             @livewire('web.services.create-images', ['Service' => $Service])
        </div>
    </div>
</section>
@endsection


