@extends('admin.layout')



@section('content')

<div class="row pt-3">
    <div class="col-12 filtered-list-search mx-auto">

        <h1 class="grid_title">Message</h1>


        <div class="container mt-5">

            <div class="mt-4">
              Name :  <p>{{ $Message->name }}</p>
            </div>

            <div class="mt-4">
               Email :  <p>{{ $Message->email }}</p>
            </div>

            <div class="mt-4">
                Subject : <p>{{ $Message->subject }}</p>
            </div>

            <div class="mt-4">
                Message : <p>{{ $Message->message }}</p>
            </div>

        </div>




@endsection
