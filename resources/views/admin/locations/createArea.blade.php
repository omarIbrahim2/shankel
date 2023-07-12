@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add Area</h1>
      <x-area-form actionRoute="area-create"></x-area-form>
 </div>


@endsection
