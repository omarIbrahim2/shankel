@extends('web.layout')

@section('nav')
<x-nav-auth></x-nav-auth>
@endsection


@section('main')
<section class="section empty">
    <div class="services-slider-image px-5">
        <h1 class="services-slider-image-title">Upload Some Images About Service</h1>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                @foreach ($Service->images as $img )
                    
                <div class="card">
                    <img src="{{asset($img->image)}}" class="card-img-top" alt="service Image">
                    <div class="card-body">
                        <a href="{{route('service-images-delete' , $img->id)}}" class="btn btn-primary">Delete</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <form>
        <div class="service-images-btns">
            <div class="upload-avatar text-start">

                <input type="file" name="image" id="teacher-avatar" multiple>

                <div class="uploadedPhotoName">
                    <label class="btn-custom" for="teacher-avatar">Upload More Photos</label>
                </div>
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn-custom">Save</button>
        </div>
        </form>
    </div>
</section>
@endsection
