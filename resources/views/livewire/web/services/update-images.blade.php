<div class="services-slider-image px-5 ">
    <h1 class="services-slider-image-title">{{trans('service.addImage')}}</h1>
    <div class="row">
        @foreach ($Service->images as $img )
        <div class="col-md-4 col-sm-6 col-12">

            <div class="card">
                <img src="{{asset($img->image)}}" class="card-img-top" alt="service Image">
                <div class="card-body">
                    <a href="{{route('service-images-delete' , $img->id)}}" class="btn btn-primary">{{trans('service.remove')}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <form wire:submit.prevent="upload">
        @if ($images)
        @foreach ($images as $image)
        <p>{{$image->getClientOriginalName()}}</p>
         @endforeach
        @endif
    <div class="service-images-btns">


        <div class="upload-avatar text-start">


            <input type="file" wire:model="images" id="teacher-avatar" multiple>

            <div class="uploadedPhotoName">
                <label class="btn-custom" for="teacher-avatar">Upload More Photos</label>
            </div>

            @error('images')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
           @enderror
        </div>
        <button type="submit" class="btn-custom">Save</button>
    </div>
    </form>
</div>
