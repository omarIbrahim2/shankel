@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>Add Socials</h1>
  

   

     <x-social-form actionRoute="social-create"></x-social-form>
 </div>


@endsection