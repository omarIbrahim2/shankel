@extends('admin.layout')



@section('content')

<div class="row mt-5">
    <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search mx-auto">
    
        <h1>Slider</h1>


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