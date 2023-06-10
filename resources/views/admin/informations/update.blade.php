@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Information</h1>

    <x-info actionRoute="info-update" :Info="$Info" update="true"></x-info>
 </div>


@endsection
