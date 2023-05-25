@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>update Information</h1>

    <x-info actionRoute="info-update" :Info="$Info" update="true"></x-info>
    {{-- <x-service-form actionRoute="service-update"  :supplierId="$supplierId" :Service="$Service"  update=true></x-service-form> --}}

 </div>


@endsection