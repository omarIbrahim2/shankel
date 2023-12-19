@extends('admin.layout')



@section('content')

<div class="row pt-3">
    <div class="col-12 filtered-list-search mx-auto">

        <h1 class="grid_title">Order Services</h1>

        @livewire('admin.orders-details',['transactionId' => $transactionId])

    </div>
</div>
@endsection