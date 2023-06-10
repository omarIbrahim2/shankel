@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Gallery</h1>

    <x-gallery actionRoute="gallery-update" :gallery="$gallery" update="true"></x-gallery>

 </div>


@endsection
