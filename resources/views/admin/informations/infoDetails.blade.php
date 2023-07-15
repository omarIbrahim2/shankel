@extends('admin.layout')



@section('content')
    <div class="row pt-3">
        <div class="col-12 filtered-list-search mx-auto">

            <h1 class="grid_title">Informations</h1>


            <div class="container mt-5">

                <div class="mt-4">
                    Image: <img src="{{ asset($Info->image) }}" style="width: 50px" alt="slider Image">
                </div>

                <div class="mt-4">
                    Title En: <p>{{ $Info->title('en') }}</p>
                </div>

                <div class="mt-4">
                    Title Ar: <p>{{ $Info->title('ar') }}</p>
                </div>

                <div class="mt-4">
                    About Us En: <p>{{ $Info->aboutUs('en') }}</p>
                </div>

                <div class="mt-4">
                    About Us Ar: <p>{{ $Info->aboutUs('ar') }}</p>
                </div>

                <div class="mt-4">
                    Mission En: <p>{{ $Info->mission('en') }}</p>
                </div>

                <div class="mt-4">
                    Mission Ar: <p>{{ $Info->mission('ar') }}</p>
                </div>

                <div class="mt-4">
                    Vision En: <p>{{ $Info->vision('en') }}</p>
                </div>

                <div class="mt-4">
                    Vision Ar: <p>{{ $Info->vision('ar') }}</p>
                </div>

                <div class="mt-4">
                    Why Choose us En: <p>{{ $Info->choose('en') }}</p>
                </div>

                <div class="mt-4">
                    Why Choose us Ar: <p>{{ $Info->choose('ar') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
