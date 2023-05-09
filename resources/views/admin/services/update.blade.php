@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>update Service</h1>

    <x-service-form actionRoute="service-update"  :Service="$Service"  update=true></x-service-form>
   
 </div>


@endsection