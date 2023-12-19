@extends('admin.layout')


@section('content')
    <div class="container mt-3">
        <h1 class="grid_title">Update Socials</h1>

        <x-social-form actionRoute="social-update" :Social="$Social" update=true></x-social-form>
    </div>
@endsection
