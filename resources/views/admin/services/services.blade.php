@extends('admin.layout')



@section('content')

<div class="row mt-5">
    <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search mx-auto">
    
        <h1>Services</h1>

    @livewire('admin.services' , ["supplierId" => $supplierId])

@endsection