@extends('admin.layout')



@section('content')

<div class="row pt-3">
    <div class="col-12 filtered-list-search mx-auto">

        <h1 class="grid_title">Informations</h1>


        <div class="container mt-5">

            <div class="mt-4">
              Image:  <img src="{{asset($Info->image)}}" style="width: 50px" alt="slider Image">
            </div>

            <div class="mt-4">
               Title:  <p>{{$Info->title()}}</p>
            </div>

            <div class="mt-4">
                About Us:  <p>{{$Info->aboutUs()}}</p>
             </div>

            <div class="mt-4">
                Mission <p>{{ $Info->mission() }}</p>
            </div>

            <div class="mt-4">
                Vision <p>{{ $Info->vision() }}</p>
            </div>


            <div class="mt-4">
                Why Choose us <p>{{ $Info->choose() }}</p>
            </div>
        </div>




@endsection
