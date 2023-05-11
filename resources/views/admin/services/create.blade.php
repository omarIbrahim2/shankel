@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>Add Service</h1>
  

   

     <x-service-form actionRoute="service-create"  :supplierId="$supplierId" ></x-service-form>
 </div>


@endsection