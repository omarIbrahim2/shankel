@extends('web.layout')


@section('title')
    Shankl | Teacher Register
@endsection

@section('nav')
<x-nav-guest/>
@endsection
@section('main')

<main class="colored-section">
    <nav class="sub-nav">
        <div class="container">
            <ul class="justify-content-center">
                <li><img src="{{asset('assets')}}/images/logo/Shankal.png" alt="shankal"></li>
            </ul>
        </div>
    </nav>
    <section class="section ">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="left-side">
                            <div class="section-title">
                                <h2 class="text-start">{{trans('register.Sign Up')}}</h2>
                                <p class="text-start p-0">{{trans("auth.LoginToYourAccount")}} <a href="{{route("teacher-login")}}">{{trans("register.ClickHere")}}</a></p>
                            </div>
                            <div class="contact-form black-contact-form">
                                @if (session()->has('status'))
                                          
                                      
                                <div class="alert alert-warning">
                                     <p>{{session()->get('status')}}</p>
                                </div>
                                @endif
                                <form method="POST" action="{{route('teacher-register')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-item me-auto ms-0">
                                        <input value="{{@old('name')}}" type="text" name="name" placeholder="{{trans('register.name')}}">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        
                                        <input value="{{@old('email')}}" type="email" name="email" placeholder="{{trans('register.email')}}">
                                        <span>
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input value="{{@old('phone')}}" type="tel" name="phone" placeholder="{{trans('register.phone')}}">
                                        <span>
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <select id="selectCity" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled>{{trans('register.city')}}</option>
                                            @foreach ($cities as $city)
                                               <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                            
                                          </select>
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        
                                        <select name="area_id" id="areaSelect" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled>{{trans('register.area')}}</option>
                                          </select>
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                        @error('area_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                     
                                    <div class="input-item me-auto ms-0">
                                        <input value="{{@old('field')}}" type="text" name="field" placeholder="{{ trans('teacher.field') }}">
                                        <span>
                                            <i class="fa-solid fa-book-open"></i>
                                        </span>
                                        @error('field')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="upload-avatar text-start">
                                        <input
                                            type="file"
                                            name="image"
                                            id="teacher-avatar"
                                            multiple
                                        />
                                        <label class="btn-custom" for="teacher-avatar"
                                            >{{trans('auth.Upload New Photo')}}</label
                                        >
                                        <div class="files-names"></div>
                                        @error('image')
                                                <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                       
                                        <input value="{{@old('password')}}" type="password" name="password" placeholder="{{trans('register.password')}}">
                                        <span>
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <span class="second show-passowrd">
                                            <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                        </span>
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input value="{{@old('password_confirmation')}}" type="password" name="password_confirmation" placeholder="{{trans('register.confirm_password')}}">
                                        <span>
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <span class="second show-passowrd">
                                            <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                        </span>
                                        
                                    </div>
                                    
                                    
                                    <div class="input-item me-auto ms-0">
                                        <button type="submit" class="custom-out-btn">
                                            {{trans("register.Sign Up")}}
                                        </button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="auth-logo">
                            <img src="{{asset('assets')}}/images/logo/Shanklbig.png" alt="shankal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    
@endsection


@section('scripts')
   
 <script>
  $("#selectCity").on('change' , function(){
     let cityId = this.value;
     var url = '{{ route("areas", ":id") }}';
    url = url.replace(':id', cityId);

     $.ajax({
        type: 'GET',

        url: url ,

        processData: false,

        contentType: 'application/json',

        cache:false,

        success: function(data){
            var your_html = "";
            $("#areaSelect").empty();
            $("#areaSelect").append("<option selected disabled>Area</option>");
            for (const key in data.areas) {
              
              
              your_html += "<option id='ar' value = " + data.areas[key].id + ">"+ data.areas[key].name +"</option>"; 
            }
            $("#areaSelect").append(your_html);


            


        }

     })

  })


 </script>



@endsection