<div>
    @error('photos.*') {{$message}} @enderror
    <div class="modal-body">

        @if ($images)
        <div class="card" style="width: 18rem;">
            @foreach ($images as $image)
            
                <img src="uploads/{{$image->name}}" class="card-img-top" alt="...">
                <p class="deletePhoto"><a href="#"><i class="fa-solid fa-xmark"></i></a></p>
              
            @endforeach
        </div>
        @else
            <div class="card" style="width: 18rem;">
                 <p>No Images found !!</p>
            </div>
        @endif
        
    </div>
    @if ($photos)
    @foreach ($photos as $photo)
    <p>{{$photo->getClientOriginalName()}}</p>
     @endforeach
    @endif
   
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" wire:click="upload"  class="btn btn-primary">Save changes</button>
      <div class="upload-avatar mb-0">
        <input type="file" wire:model.defer="photos" id="School-profile-photos" multiple>
        <label class="btn-custom p-2" for="School-profile-photos" >Upload New Photos</label>
    </div>
</div>
