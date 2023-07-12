@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update area</h1>

    <x-area-form actionRoute="area-update" :Area="$Area" update="true"></x-area-form>
 </div>


@endsection
