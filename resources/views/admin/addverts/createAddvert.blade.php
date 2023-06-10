@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add Addvertisment</h1>

    <x-addvert-form actionRoute="create-addverts" ></x-addvert-form>
 </div>


@endsection
