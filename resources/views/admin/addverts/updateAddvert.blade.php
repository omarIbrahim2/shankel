@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>Update Addvertisment</h1>
  
    <x-addvert-form actionRoute="update-addvert" :addvert="$addvert"  update=true></x-addvert-form>
 </div>


@endsection

