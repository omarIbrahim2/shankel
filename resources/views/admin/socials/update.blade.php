@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>Update Socials</h1>
  
     <x-social-form actionRoute="social-update" :Social="$Social" update=true></x-social-form>
 </div>


@endsection