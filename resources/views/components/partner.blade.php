@props(['actionRoute'=> "create-slider" , "Partner" => null  ,  "update" =>false])


<form action="{{ route($actionRoute) }}"  method="POST" enctype="multipart/form-data">


    @csrf

    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Partner == null ? "":$Partner->id}}">
        @error("id")
           <p>{{$message}}</p>
        @enderror
    @endif

    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label"> upload Image</label>
                <input name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        @if($update == true)
            <img src="{{asset($Partner->image)}}" style="width: 60px" alt="Partner image">
        @endif
    </div>


            @if ($update == false)
            <button type="submit" class="btn btn-primary mt-4">Add</button>
            @else
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            @endif

</form>
