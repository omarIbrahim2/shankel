@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Partner</h1>

    <x-partner actionRoute="partner-update" :Partner="$Partner" update=true></x-partner>
z

 </div>


@endsection