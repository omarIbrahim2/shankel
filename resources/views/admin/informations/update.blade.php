@extends('admin.layout')


@section('content')

 <div class="container mt-5">
    <h1>update Information</h1>

    <x-info actionRoute="info-update" :Info="$Info" update="true"></x-info>
 </div>


@endsection