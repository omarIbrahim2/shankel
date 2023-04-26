<div class="row">

    <div class="col-md-6 col-12 mb-s-0 mb-3">
        <div class="from-container">
            <div class="contact-form black-contact-form">
                <form wire:submit.prevent="update">
                
                    @if (session()->has("success"))
                    <div class="alert alert-success">
                        {{session('success')}}
                       </div>
                    @endif
                    <div class="input-item me-auto ms-0">
                        <input type="text" wire:model = "name" placeholder="name">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="second">
                            <i class="fa-solid fa-pen"></i>
                        </span>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    

                    <div class="input-item me-auto ms-0">
                        <select wire:model="birth_date" placeholder="MM">
                            <option selected  aria-hidden="true">MM</option>
                            <option  name="January" value="January">Jan</option>
                            <option name="February" value="February">Feb</option>
                            <option name="March" value="March">Mar</option>
                            <option name="April" value="April">Apr</option>
                            <option name="May" value="May">May</option>
                            <option name="June" value="June">Jun</option>
                            <option name="July" value="July">Jul</option>
                            <option name="August" value="August">Aug</option>
                            <option name="September" value="September">Sep</option>
                            <option name="October" value="October">Oct</option>
                            <option name="November" value="November">Nov</option>
                            <option name="December" value="December">Dec</option>
                        </select>

                        <span>
                            <i class="fa-regular fa-calendar-days"></i>
                        </span>
                        <span class="second">
                            <i class="fa-solid fa-pen"></i>
                        </span>
                        @error('birth_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-item me-auto ms-0">
                        <input type="text" wire:model='age' placeholder="age" >
                        <span>
                            <i class="fa-regular fa-calendar-days"></i>
                        </span>
                        <span class="second">
                            <i class="fa-solid fa-pen"></i>
                        </span>
                        @error('age')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                      
            
                    <div class="input-item me-auto ms-0">
                        <label>Gender</label>
                        <div class="d-flex align-items-center justify-content-start">
                            <div class="d-flex align-items-center justify-content-start">
                                <label for="male">Male</label>
                                <input type="radio" value="male" wire:model="gender" class="not-hidden ms-2" id="male">
                            </div>
                            <div class="d-flex align-items-center justify-content-start ms-2">
                                <label for="female">Female</label>
                                <input type="radio" value="female" wire:model="gender" class="not-hidden ms-2" id="female">
                            </div>
                        </div>
                    </div>
                    <div class="input-item me-auto ms-0 mt-32">
                        <input type="file" wire:model ="image" id="parent-profile"/>
    
                        <label class="file-input" for="parent-profile">
                            <span>
                                <i class="fa-regular fa-image"></i>
                            </span>
                           
                            <p class="upload-text">Upload Profile</p>
                            <button class="btn-custom btn-gray-custom">
                                choose
                            </button>
                        </label>
                        @error('image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
     
                      
                    <div class="input-item me-auto ms-0">
                        <select  wire:model="grade_id" class="form-select" aria-label="Default select example" required>
                            <option selected>Grade</option>
                            @foreach ($grades as $grade)
                               <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                            
                        </select>
                        <span>
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        @error('grade_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      
                    </div>
                   
                    <div class="input-item me-auto ms-0">
                        <button type="submit" class="custom-out-btn btn-form">
                            save
                        </button>
                    </div>
                   
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-12 mb-s-0 mb-3">
        <div class="from-container">
            <div class="kids-container">
                @foreach ($children as $ch)
                <div style="cursor: pointer" class="kid" wire:click="fillInputs({{$ch}})">
                    <div class="kid-icon icon-animate">
                        <img src="assets/images/charcters/shankal.png" alt="shankal">
                    </div>
                    <div class="kid-data">
                        <p class="kid-name">{{$ch->name}}</p>
                        <p class="kid-status"><a href="#"><i class="fa-regular fa-trash-can"></i></a></p>
                    </div>
                </div>
                @endforeach
               
                <div class="kid add-kid">
                    <a href="#"><div class="kid-icon ">
                        <img src="assets/images/charcters/plus.png" alt="add kids">
                    </div></a>
                    <div class="kid-data">
                        <p class="kid-name">Add a Child</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
