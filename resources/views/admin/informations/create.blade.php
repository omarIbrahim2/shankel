@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>Add Information</h1>
  

  
      <x-info actionRoute="info-create"></x-info>
     {{-- <x-service-form actionRoute="service-create"  :supplierId="$supplierId" ></x-service-form> --}}
 </div>


@endsection