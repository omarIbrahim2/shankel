@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Update Education System</h1>
    <x-edu-system-form actionRoute="eduSystem-update" :eduSystem="$eduSystem" update="true"></x-edu-system-form>
 </div>

@endsection
