@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add Partner</h1>


     <x-partner actionRoute="partner-create"></x-partner>

     {{-- <x-service-form actionRoute="service-create"  :supplierId="$supplierId" ></x-service-form> --}}
 </div>


@endsection