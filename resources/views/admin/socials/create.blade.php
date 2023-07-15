@extends('admin.layout')


@section('content')
    <div class="container mt-3">
        <h1 class="grid_title">Add Socials</h1>
        <x-social-form actionRoute="social-create"></x-social-form>
    </div>
@endsection
