@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add Educatin System</h1>
      <x-edu-system-form actionRoute="eduSystem-create"></x-edu-system-form>
 </div>


@endsection
