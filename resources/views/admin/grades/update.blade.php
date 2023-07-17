@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Update Grade</h1>
    <x-grade-form actionRoute="grade-update" :grade="$grade" update="true"></x-grade-form>
 </div>

@endsection
