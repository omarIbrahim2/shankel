<div>
        <div class="section-content">
            @if (session()->has("success"))
            <div class="alert alert-success">
                {{session('success')}}
               </div>
            @endif
            <div class="row">
                <div class="col-lg-3 col-md-5 col-12">
                    <div class="left-side">
                        <div class="sub-title">
                            <h3>Profile</h3>
                        </div>
                        <div class="teacher-avatar rounded-0">
                    
                            <img src="{{$AuthUser->image}}" alt="avatar">
                            <h4>
                                <a href="#">{{$AuthUser->name}}</a>
                            </h4>
                            
                            <div class="avatar-btns">
                                @if ($image != null)
                                <p>{{$image->getClientOriginalName()}}</p>
                                @endif
                                <div class="upload-avatar">
                                    <input type="file" wire:model.defer= "image" name="teacher-avatar" id="teacher-avatar" >
                                    <label class="btn-custom" for="teacher-avatar">Upload New Photo</label>
                                </div>
                                
                                @error('image') {{$message}} @enderror
                                <div class="upload-avatar">
                                    <button type="button" class="btn-custom" data-bs-toggle="modal" data-bs-target="#schoolAlbum">Upload School Photos</button>
                                </div>
                            </div>
                        </div>
                        <div class="provider-description">
                            <h4>
                                <span><i class="fa-solid fa-file-pen"></i></span>
                                <span>Description</span>
                                @error('desc') {{$message}} @enderror
                            </h4>
                            <textarea wire:model.defer="desc"> {{$desc?$desc:'No data'}}</textarea>
                        </div>
                        <div class="provider-description">
                            <h4>
                                <span><i class="fa-solid fa-file-pen"></i></span>
                                <span>Mission</span>
                                @error('mission') {{$message}} @enderror
                            </h4>
                            <textarea wire:model.defer="mission">{{$mission}}</textarea>                        
                        </div>
                        <div class="provider-description">
                            <h4>
                                <span><i class="fa-solid fa-file-pen"></i></span>
                                <span>vision</span>
                                @error('vision') {{$message}} @enderror
                            </h4>
                            <textarea wire:model.defer="vision"> {{$vision}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7  col-12">
                    <div class="right-side">
                        <div class="right-side-item">
                            <div class="sub-title main-sub-title">
                                <h3>Basic Info</h3>
                                <div class="sub-btns">
    
                                    <button wire:click="save" type="buttom" class="btn-custom">Save</button>
                                    <a href="{{route("change_pass_school")}}"  class="btn-custom" >
                                        Reset Password
                                    </a>
                                </div>
                            </div>
                            <div class="contact-form ">
                                    <div class="input-item">
                                        <input type="text" wire:model="name" placeholder="name">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        @error('name') {{$message}} @enderror
                                    </div>
                                    
                                    <div class="input-item">
                                        <input type="email" wire:model="email" placeholder="email">
                                        <span>
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        @error('email') {{$message}} @enderror
                                    </div>
                                    <div class="input-item">
                                        <input type="tel" wire:model="phone" placeholder="phone" required>
                                        <span>
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        @error('phone') {{$message}} @enderror
                                    </div>
                                    <div class="input-item">
                                        
                                        <input placeholder="{{$establish_date? $establish_date : "Date of Etablishment"}}" class="textbox-n" type="text" wire-model="establish_date"  id="date" />
                                        <span>
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                        @error('establish_date') {{$message}} @enderror
                                    </div>
                                    <div class="input-item ">
                                        <select wire:model="city" class="form-select" aria-label="Default select example" >
                                            <option selected>{{$authCity->name}}</option>
                                           @foreach ($cities as $city)
                                                <option   value="{{$city->id}}">{{$city->name}}</option>
                                             @endforeach
                                          </select>
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                    </div>
                                    <div class="input-item ">
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
                                        @error('area_id') {{$message}} @enderror
                                    </div>
                                    <div class="input-item edit-field">
                                        <h4>
                                            School Grades
                                        </h4>
                                        
                                        <div class="select-cont">
                                        
                                            
                                            @foreach ($grades as $grade)
                                            <div class="checkbox">
                                            
                                                <input type="checkbox" wire:model="Ugrades.{{$grade->id}}" id="nursery" >
                                                <label for="nursery">
                                                    {{$grade->name}}
                                                </label>
                                            </div>     
                                            @endforeach
                                           
                                            
                                        </div>
                                        <h4 class="mt-2">
                                            Educational system
                                        </h4>
                                        <div class="input-item me-auto ms-0">
                                            <select id="selectEduSystem" class="form-select" aria-label="Default select example" wire:model="edu_systems_id" >
                                                <option selected>Education System </option>
                                                @foreach ($eSystems as $system)
                                                   <option value="{{$system->id}}">{{$system->name}}</option>
                                                @endforeach
                                              </select>
                                            <span>
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                            @error('edu_systems_id') {{$message}} @enderror
                                        </div>
                                        
                                    </div>
                            </div>
                        </div>
                        <div class="right-side-item">
                            <div class="sub-title main-sub-title">
                                <h3>External Links</h3>
                                
                            </div>
                            <div class="contact-form ">
                               
                                    <div class="input-item">
                                        <input type="url"  wire:model="facebook" placeholder="Facebook URL">
                                        <span>
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </span>
                                        @error('facebook') {{$message}} @enderror
                                    </div>
                                    
                                    <div class="input-item">
                                        <input type="url" wire:model="twitter" placeholder="Twitter URL">
                                        <span>
                                            <i class="fa-brands fa-twitter"></i>
                                        </span>
                                        @error('twitter') {{$message}} @enderror
                                    </div>
                                   
                                    <div class="input-item ">
                                        <input type="url" wire:model="linkedin" placeholder="Linkedin URL">
                                        <span>
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </span>
                                        @error('linkedin') {{$message}} @enderror
                                    </div>
                                    
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- school photos album --}}
            <!-- Modal -->
<div class="modal fade" id="schoolAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">School Photos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card" style="width: 18rem;">
                <img src="{{asset("assets/images/school/3.webp")}}" class="card-img-top" alt="...">
                <p class="deletePhoto"><a href="#"><i class="fa-solid fa-xmark"></i></a></p>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
          <div class="upload-avatar mb-0">
            <input type="file" name="School-profile-photos" id="School-profile-photos" multiple>
            <label class="btn-custom p-2" for="School-profile-photos" >Upload New Photos</label>
        </div>
        </div>
      </div>
    </div>
  </div>
        </div>
</div>
