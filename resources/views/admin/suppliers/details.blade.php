@extends('admin.layout')



@section('content')


 <x-user-details id="{{$id}}" guard="supplier"></x-user-details>       
         


@endsection