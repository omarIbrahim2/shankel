@extends('admin.layout')


@section('content')
 <div class="container mt-3">
    <h1 class="grid_title">Add Slider</h1>
     <x-slider-form actionRoute="slider-create"></x-slider-form>
 </div>
@endsection
