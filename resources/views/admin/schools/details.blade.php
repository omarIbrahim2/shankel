@extends('admin.layout')



@section('content')


 <x-user-details id="{{$id}}" guard="school"></x-user-details>       
         


@endsection