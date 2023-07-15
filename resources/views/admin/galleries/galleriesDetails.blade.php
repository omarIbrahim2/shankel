@extends('admin.layout')



@section('content')
    <div class="row pt-3">
        <div class="col-12 filtered-list-search mx-auto">

            <h1 class="grid_title">Galleries</h1>


            <div class="container mt-5">

                <div class="mt-4">
                    Image: <img src="{{ asset($gallery->image) }}" style="width: 50px" alt="gallery Image">
                </div>

                <div class="mt-4">
                    Title En: <p>{{ $gallery->title('en') }}</p>
                </div>

                <div class="mt-4">
                    Title Ar: <p>{{ $gallery->title('ar') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
