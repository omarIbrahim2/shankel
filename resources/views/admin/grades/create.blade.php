@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add Grade</h1>
      <x-grade-form actionRoute="grade-create"></x-grade-form>
 </div>


@endsection
