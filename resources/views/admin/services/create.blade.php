@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add Service</h1>
     <x-service-form actionRoute="service-create"  :supplierId="$supplierId" ></x-service-form>
 </div>


@endsection
