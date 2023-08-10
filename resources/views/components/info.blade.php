@props(['actionRoute'=> "info-create" , "Info" => null  ,  "update" =>false])


<form action="{{ route($actionRoute) }}"  method="POST" enctype="multipart/form-data">


    @csrf
  
    @if ($update == true)
        <input name="id" hidden type="text" value="{{$Info == null ? "":$Info->id}}">
        @error("id")
           <p>{{$message}}</p>
        @enderror
    @endif

    
    <div class="form-group mb-4">
    <label for="event-title">Title</label>
        <input name="title_en" id="event-title" value="{{$Info == null ? old('title_en'): $Info->title('en')}}" type="text" class="form-control"  placeholder="title">
        @error('title_en')
        <p class="text-danger">{{$message}}</p>
        @enderror

    </div>

    <div class="form-group mb-4">
        <label for="event-title">العنوان</label>
            <input name="title_ar" id="event-title" value="{{$Info == null ? old('title_ar'):$Info->title("ar")}}" type="text" class="form-control"  placeholder="العنوان">
            @error('title_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror
    
    </div>
    
    <div class="form-group mb-4">
        <label for="info_aboutUs_en">About Us</label>
            <textarea name="aboutUs_en"  id="info_aboutUs_en" cols="30" placeholder="About Us" rows="10" class="form-control ">{!! $Info == null ? old('aboutUs_en'):$Info->aboutUs('en') !!}</textarea>
            @error('aboutUs_en')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div> 
        
        
        <div class="form-group mb-4">
            <label for="info_aboutUs_ar">ماذا عنا</label>
                <textarea name="aboutUs_ar"  id="info_aboutUs_ar" cols="30" placeholder="ماذا عنا" rows="10" class="form-control ">{!! $Info == null ? old('aboutUs_ar'):$Info->aboutUs('ar') !!}</textarea>
                @error("aboutUs_ar")
                <p class="text-danger">{{$message}}</p>
                @enderror
        </div> 

            <div class="form-group mb-4">
                <label for="info_mission_en">Mission</label>
                    <textarea name="mission_en"  id="info_mission_en" cols="30" placeholder="Mission" rows="10" class="form-control ">{!! $Info == null ? old('mission_en'):$Info->mission('en') !!}</textarea>
                    @error('mission_en')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
          </div>
          
          <div class="form-group mb-4">
            <label for="info_mission_ar">المهمة</label>
                <textarea name="mission_ar"  id="info_mission_ar" cols="30" placeholder="المهمة" rows="10" class="form-control ">{!!$Info == null ? old('mission_ar'):$Info->mission('ar')!!}</textarea>
                @error('mission_ar')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div> 


            <div class="form-group mb-4">
                <label for="info_vision_en">Vision</label>
                    <textarea name="vision_en"  id="info_vision_en" cols="30" placeholder="Vision" rows="10" class="form-control ">{!!$Info == null ? old('vision_en'):$Info->vision('en')!!}</textarea>
                    @error('vision_en')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
           </div> 


          <div class="form-group mb-4">
            <label for="info_vision_ar">الرؤية</label>
                <textarea name="vision_ar"  id="info_vision_ar" cols="30" placeholder="الرؤية" rows="10" class="form-control ">{!!$Info == null ? old('vision_ar'):$Info->vision('ar')!!}</textarea>
                @error('vision_ar')
                <p class="text-danger">{{$message}}</p>
                @enderror
         </div>


         <div class="form-group mb-4">
            <label for="info_choose_en">Why choose us</label>
                <textarea name="choose_en"  id="info_choose_en" cols="30" placeholder="Why choose us" rows="10" class="form-control ">{!!$Info == null ? old('choose_en'):$Info->choose('en')!!}</textarea>
                @error('choose_en')
                <p class="text-danger">{{$message}}</p>
                @enderror
       </div> 
                 
       <div class="form-group mb-4">
        <label for="info_choose_ar">لماذا تختارنا</label>
            <textarea name="choose_ar"  id="info_choose_ar" cols="30" placeholder="لماذا تختارنا" rows="10" class="form-control ">{!!$Info == null ? old('choose_ar'):$Info->choose('ar')!!}</textarea>
            @error('choose_ar')
            <p class="text-danger">{{$message}}</p>
            @enderror
   </div>       
              
    <div class="form-group">
        <div class="custom-file-container my-3" data-upload-id="myFirstImage">
            <label for="eventImage" class="form-label"> upload Image</label>
                <input name="image" class="form-control py-2" id="eventImage" type="file"  accept="image/*">

            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror

            @if ($update == true)

              <img src="{{asset($Info->image)}}" style="width: 60px" alt="Information">
                
            @endif
        </div>
    </div> 
       
    
            @if ($update == false)
            <button type="submit" class="btn btn-primary mt-4">Add</button>
            @else
            <button type="submit" class="btn btn-primary mt-4">Update</button>
            @endif
            <a href="{{route('Infos')}}" class="btn btn-primary mt-4">Back</a>
</form>