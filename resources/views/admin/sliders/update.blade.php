@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Slider</h1>

    <x-slider-form actionRoute="slider-update" :Slider="$Slider" update=true></x-slider-form>

    {{-- <x-service-form actionRoute="service-update"  :supplierId="$supplierId" :Service="$Service"  update=true></x-service-form> --}}

 </div>


@endsection
