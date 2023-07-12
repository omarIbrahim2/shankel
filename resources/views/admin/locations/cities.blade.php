@extends('admin.layout')



@section('content')
    <div class="row pt-3">
        <div class="col-12 filtered-list-search mx-auto">

            <h1 class="grid_title">Cities</h1>

            @livewire('admin.cities')
        </div>
    </div>
@endsection
