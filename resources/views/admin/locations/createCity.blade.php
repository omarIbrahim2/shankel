@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add City</h1>
      <x-city-form actionRoute="city-create"></x-city-form>
 </div>


@endsection
