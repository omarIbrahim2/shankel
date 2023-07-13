@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update City</h1>

    <x-city-form actionRoute="city-update" :City="$City" update="true"></x-city-form>
 </div>


@endsection
