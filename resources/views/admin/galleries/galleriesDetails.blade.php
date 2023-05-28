@extends('admin.layout')



@section('content')

<div class="row mt-5">
    <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search mx-auto">
    
        <h1>Galleries</h1>


        <div class="container mt-5">
          
            <div class="mt-4">
              Image:  <img src="{{asset($gallery->image)}}" style="width: 50px" alt="gallery Image">
            </div>

            <div class="mt-4">
               Title:  <p>{{$gallery->title}}</p>
            </div>

            
        </div>
       
         


@endsection