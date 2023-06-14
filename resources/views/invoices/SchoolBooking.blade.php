@extends('web.layout')


@section('main')
    
   <div class="container">
    
     <p> order number : {{ $order->id}}</p>
     <p>order code : {{ $order->order_code }}</p>

   </div>
@endsection