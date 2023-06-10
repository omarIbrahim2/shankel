@extends('admin.layout')



@section('content')

<div class="row pt-3">
    <div class="col-12 filtered-list-search mx-auto">

        <h1 class="grid_title">Slider</h1>


        <div class="container mt-5">

            <div class="mt-4">
              Image:  <img src="{{asset($Slider->image)}}" style="width: 50px" alt="slider Image">
            </div>

            <div class="mt-4">
               Title:  <p>{{$Slider->title()}}</p>
            </div>

            <div class="mt-4">
                Info: <p>{{ $Slider->info() }}</p>
            </div>
        </div>




@endsection
