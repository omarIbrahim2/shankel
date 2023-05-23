@extends('admin.layout')



@section('content')

<div class="row mt-5">
    <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search mx-auto">
    
        <h1>Message</h1>


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