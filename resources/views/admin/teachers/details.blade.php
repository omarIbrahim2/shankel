@extends('admin.layout')



@section('content')


 <x-user-details id="{{$id}}" guard="teacher"></x-user-details>       
         


@endsection