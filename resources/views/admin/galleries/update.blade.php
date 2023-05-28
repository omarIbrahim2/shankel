@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>update Gallery</h1>

    <x-gallery actionRoute="gallery-update" :gallery="$gallery" update="true"></x-gallery>

 </div>


@endsection