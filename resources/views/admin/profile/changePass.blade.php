@extends('admin.layout')


@section('content')
    <div class="container mt-3">

        <x-change-pass actionRoute="submit-change-pass-admin" guard="web"></x-change-pass>

    </div>
@endsection
