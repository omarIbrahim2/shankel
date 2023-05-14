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
                            <h3>{{ trans('school.profile') }}</h3>
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
                                    <label class="btn-custom" for="teacher-avatar">{{ trans('school.uploadNew') }}</label>
                                </div>
                                
                                @error('image') {{$message}} @enderror
                                <div class="upload-avatar">
                                    <button type="button" class="btn-custom" data-bs-toggle="modal" data-bs-target="#schoolAlbum">{{ trans('school.uploadSchoolPhoto') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="provider-description">
                            <h4>
                                <span><i class="fa-solid fa-file-pen"></i></span>
                                <span>{{ trans('school.desc') }}</span>
                                @error('desc') <p class="text-danger">{{$message}}</p> @enderror
                            </h4>
                            <textarea wire:model.defer="desc"> {{$desc?$desc:'No data'}}</textarea>
                        </div>
                        <div class="provider-description">
                            <h4>
                                <span><i class="fa-solid fa-file-pen"></i></span>
                                <span>{{ trans('school.mission') }}</span>
                                @error('mission') <p class="text-danger">{{$message}}</p> @enderror
                            </h4>
                            <textarea wire:model.defer="mission">{{$mission}}</textarea>                        
                        </div>
                        <div class="provider-description">
                            <h4>
                                <span><i class="fa-solid fa-file-pen"></i></span>
                                <span>{{ trans('school.vision') }}</span>
                                @error('vision') <p class="text-danger">{{$message}}</p> @enderror
                            </h4>
                            <textarea wire:model.defer="vision"> {{$vision}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7  col-12">
                    <div class="right-side">
                        <div class="right-side-item">
                            <div class="sub-title main-sub-title">
                                <h3>{{ trans('school.info') }}</h3>
                                <div class="sub-btns">
    
                                    <button wire:click="save" type="buttom" class="btn-custom">{{ trans('school.save') }}</button>
                                    <a href="{{route("change_pass_school")}}"  class="btn-custom" >
                                        {{ trans('school.reset') }}
                                    </a>
                                </div>
                            </div>
                            <div class="contact-form ">
                                    <div class="input-item">
                                        <input type="text" wire:model="name" placeholder="{{ trans('school.name') }}">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    
                                    <div class="input-item">
                                        <input type="email" wire:model="email" placeholder="{{ trans('school.email') }}">
                                        <span>
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    <div class="input-item">
                                        <input type="tel" wire:model="phone" placeholder="{{ trans('school.phone') }}" required>
                                        <span>
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    <div class="input-item">
                                        
                                        <input placeholder="{{$establish_date? $establish_date : trans('school.establishDate')}}" class="textbox-n" type="text" wire-model="establish_date"  id="date" />
                                        <span>
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                        @error('establish_date') <p class="text-danger">{{$message}}</p> @enderror
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
                                        @error('area_id') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    <div class="input-item edit-field">
                                        <h4>
                                            {{ trans('school.schoolGrades') }}
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
                                            {{ trans('school.educationalSystem') }}
                                        </h4>
                                        <div class="input-item me-auto ms-0">
                                            <select id="selectEduSystem" class="form-select" aria-label="Default select example" wire:model="edu_systems_id" >
                                                <option selected>{{ trans('school.eduSystem') }} </option>
                                                @foreach ($eSystems as $system)
                                                   <option value="{{$system->id}}">{{$system->name}}</option>
                                                @endforeach
                                              </select>
                                            <span>
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                            @error('edu_systems_id') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        
                                    </div>
                            </div>
                        </div>
                        <div class="right-side-item">
                            <div class="sub-title main-sub-title">
                                <h3>{{ trans('school.externalLink') }}</h3>
                                
                            </div>
                            <div class="contact-form ">
                               
                                    <div class="input-item">
                                        <input type="url"  wire:model="facebook" placeholder="{{ trans('school.facebook') }}">
                                        <span>
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </span>
                                        @error('facebook') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                    
                                    <div class="input-item">
                                        <input type="url" wire:model="twitter" placeholder="{{ trans('school.twitter') }}">
                                        <span>
                                            <i class="fa-brands fa-twitter"></i>
                                        </span>
                                        @error('twitter') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                   
                                    <div class="input-item ">
                                        <input type="url" wire:model="linkedin" placeholder="{{ trans('school.linked') }}">
                                        <span>
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </span>
                                        @error('linkedin') <p class="text-danger">{{$message}}</p> @enderror
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('school.schoolPhotos') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <div class="modal-body">
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
        </div> --}}

        @livewire('school.school-photos' , ["AuthUser" => $AuthUser])
        </div>
      </div>
    </div>
  </div>
        </div>
</div>
