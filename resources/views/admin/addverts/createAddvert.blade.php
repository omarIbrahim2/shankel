@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>Add Addvertisment</h1>
  
    <x-addvert-form actionRoute="create-addverts" ></x-addvert-form>
 </div>


@endsection
