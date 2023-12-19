@extends('admin.layout')



@section('content')

<div class="row pt-3">
    <div class="col-12 filtered-list-search mx-auto">

        <h1 class="grid_title">Addvertisments</h1>


        <div class="container mt-5">

            <div class="mt-4">
              Image:  <img src="{{asset($Addvert->image)}}" style="width: 50px" alt="slider Image">
            </div>

            <div class="mt-4">
               Title En:  <p>{{$Addvert->title('en')}}</p>
            </div>

            <div class="mt-4">
              Title Ar:  <p>{{$Addvert->title('ar')}}</p>
           </div>

            <div class="mt-4">
                Description En:  <p>{!!$Addvert->desc('en')!!}</p>
             </div>

             <div class="mt-4">
              Description Ar:  <p>{!!$Addvert->desc('ar')!!}</p>
           </div>
        </div>




@endsection
