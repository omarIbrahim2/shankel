@extends('admin.layout')



@section('content')
    <div class="row pt-3">
        <div class="col-12 filtered-list-search mx-auto">

            <h1 class="grid_title">Schools</h1>

            @livewire('admin.schools', ['active' => $active])
        </div>
    </div>
@endsection
