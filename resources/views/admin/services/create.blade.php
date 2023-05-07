@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>Add Service</h1>
  

    {{-- <x-supplier-form actionRoute="supplier-register"  :cities="$cities"></x-supplier-form> --}}

     <x-service-form actionRoute="service-create"  :supplierId="$supplierId"  update=false></x-service-form>
 </div>


@endsection