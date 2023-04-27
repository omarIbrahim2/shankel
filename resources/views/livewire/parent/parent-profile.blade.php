<div>
    <div class="from-container">
        <div class="contact-form black-contact-form">
            @if (session()->has("success"))
            <div class="alert alert-success">
                {{session('success')}}
               </div>
            @endif
            <form wire:submit.prevent="save" enctype="multipart/form-data">
    
                <div class="input-item me-auto ms-0">
                   
                    <input type="text"  placeholder="name" wire:model="name">
                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span class="second">
                        <i class="fa-solid fa-pen"></i>
                    </span>
                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="input-item me-auto ms-0">

                    <input type="email"  placeholder="email"
                    wire:model="email">
                    <span>
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <span class="second">
                        <i class="fa-solid fa-pen"></i>
                    </span>
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="input-item me-auto m-0">
                    <input type="tel"  placeholder="phone" wire:model="phone">
                    <span>
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <span class="second">
                        <i class="fa-solid fa-pen"></i>
                    </span>
                    @error('phone')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="input-item me-auto ms-0">
                   
                    <select   wire:model="city" id="selectCity" class="form-select" aria-label="Default select example">
                        <option selected>{{$authCity->name}}</option>
                        @foreach ($cities as $city)
                           <option   value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                        
                      </select>
                    
                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                    </span>

                    @error('city') {{$message}} @enderror
                </div>
                
                <div class="input-item me-auto ms-0">
                    
                    <select wire:model="area_id"   id="areaSelect" class="form-select" aria-label="Default select example" >
                        <option  value="{{$authArea->id}}" selected>{{$authArea->name}}</option>
                          @if ($Areas)
                    
                            @foreach ($Areas as $Area)
                            <option  value="{{$Area->id}}">{{$Area->name}}</option> 
                            @endforeach
                         @endif
                      </select>
                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                    @error('area_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="input-item me-auto ms-0 mt-32">
                    <input type="file" wire:model = 'image' id="parent-profile">

                    <label class="file-input" for="parent-profile">
                        <span>
                            <i class="fa-regular fa-image"></i>
                        </span>
                        
                         @if ($image != null)
                         <p class="upload-text files-names">{{$image->getClientOriginalName()}}</p>
                         @else
                         <p class="upload-text files-names">Upload Photo</p>
                         @endif
                        
                        <div type="button" class="btn-custom btn-gray-custom">
                            choose
                        </div>
                    </label>
                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="input-item me-auto ms-0">
                    <button type="submit" class="custom-out-btn btn-form" >
                        save
                    </button>
 
                    <a href="{{route("change_pass_parent")}}"  class="custom-out-btn btn-form" >
                        Reset Password
                    </a>
                    
                </div>

            </form>

        </div>
    </div>
   
</div>

