

@props(['actionRoute'=> "social-create" , "Social" => null  ,  "update" =>false])

<form action="{{route($actionRoute)}}"  method="POST">
    @csrf
    
    @if ($update == true)
         
        <input type="hidden" name="id"  value="{{$Social->id}}">
    @endif
    <div class="form-group mb-4">
    <label for="event-title">Facebook</label>
        <input name="facebook" id="event-title"  value="{{$Social == null ? old('facebook'):$Social->facebook}}" type="text" class="form-control"  placeholder="URL">
        @error('facebook')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-title">Twitter</label>
            <input name="twitter" id="event-title" value="{{$Social == null ? old('twitter'):$Social->twitter}}" type="text" class="form-control"  placeholder="URL">
            @error('twitter')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-title">Instagram</label>
            <input name="instagram" id="event-title" value="{{$Social == null ? old('instagram'):$Social->instagram}}" type="text" class="form-control"  placeholder="URL">
            @error('instagram')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

    <div class="form-group mb-4">
            <label for="event-title">Linkedin</label>
            <input name="Linkedin" id="event-title" value="{{$Social == null ?  old('Linkedin'):$Social->Linkedin}}" type="text" class="form-control"  placeholder="URL">
            @error('Linkedin')
                <p class="text-danger">{{$message}}</p>
            @enderror
    </div>
    
    <div class="form-group mb-4">
        <label for="event-title">Email</label>
        <input name="email" id="event-title" value="{{$Social == null ? old('email'):$Social->email}}" type="email" class="form-control"  placeholder="email">
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>  

    <div class="form-group mb-4">
        <label for="event-title">Phone</label>
        <input name="phone" id="event-title" value="{{$Social == null ? old('phone'):$Social->phone}}" type="text" class="form-control"  placeholder="phone">
        @error('phone')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-title">Address</label>
        <input name="address_en" id="event-title" value="{{$Social == null ? old('address_en'):$Social->address('en')}}" type="text" class="form-control"  placeholder="Address">
        @error('address')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mb-4">
        <label for="event-title">العنوان</label>
        <input name="address_ar" id="event-title" value="{{$Social == null ? old('address_ar'):$Social->address('ar')}}" type="text" class="form-control"  placeholder="العنوان">
        @error('address')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
            @if ($update == false)
            <button type="submit" class="btn btn-primary mt-4">Add</button>
            @else
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            @endif
            
</form>
