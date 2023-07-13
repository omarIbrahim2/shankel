@extends('web.layout')

@section('nav')
<x-nav-guest/>
@endsection

@section('main')

<main class="colored-section">
    <nav class="sub-nav">
        <div class="container">
            <ul class="justify-content-center">
                <li><img src="{{asset('assets')}}/images/logo/Shankal.png" alt="shankal" /></li>
            </ul>
        </div>
    </nav>
    <section class="section">
        <div id="startInn" data-langShankl="{{App::getLocale()}}" class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="left-side">
                            <div class="section-title">
                                <h2 class="text-start">{{trans('register.Sign Up')}}</h2>
                                <p class="text-start p-0">
                                    {{trans("auth.LoginToYourAccount")}} <a href="{{route('parent-login')}}">{{trans("register.ClickHere")}}</a>
                                </p>
                            </div>
                            <div class="contact-form black-contact-form">
                                <form method="POST" action="{{route('parent-register')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="input-item me-auto ms-0">


                                        <input value="{{@old('name')}}" type="text" name="name" placeholder="{{trans('register.name')}}" />
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">


                                        <input value="{{@old('email')}}" type="email" name="email" placeholder="{{trans('register.email')}}" />
                                        <span>
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">

                                        <input value="{{@old('phone')}}" type="tel" name="phone" placeholder="{{trans('register.phone')}}" />
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
                                        <label>{{ trans('parent.gender') }}</label>
                                        <div class="d-flex align-items-center justify-content-start" >
                                            <div class="d-flex align-items-center justify-content-start">
                                                <label for="male">{{ trans('parent.male') }}</label>
                                                <input
                                                    type="radio"
                                                    value="male"
                                                    {{old('gender') == 'male' ? 'checked=' . '"' . 'checked'. '"' : ''}}
                                                    name="gender"
                                                    class="not-hidden ms-2"
                                                    id="male"
                                                />
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start ms-2" >
                                                <label for="female">{{ trans('parent.female') }}</label>
                                                <input type="radio"
                                                    value="female "
                                                    name="gender"
                                                    {{old('gender') == 'female' ? 'checked=' . '"' . 'checked'. '"' : ''}}
                                                    class="not-hidden ms-2"
                                                    id="female"
                                                />
                                            </div>

                                        </div>
                                        @error('gender')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <p id="imgName"></p>
                                    <div class="upload-avatar text-start">
                                        <input type="file" name="image" id="teacher-avatar" multiple/>
                                        <label class="btn-custom" for="teacher-avatar">{{trans('auth.Upload New Photo')}}</label>
                                        <div class="files-names"></div>
                                        @error('image')
                                                <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input
                                            type="password"
                                            name="password"
                                            value="{{old('password')}}"
                                            placeholder="{{trans('register.password')}}"
                                        />
                                        <span>
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <span class="second show-passowrd">
                                            <i
                                                class="fa-regular fa-eye-slash fa-flip-horizontal"
                                            ></i>
                                        </span>
                                        @error('password')
                                                <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            value="{{old('password_confirmation')}}"
                                            placeholder="{{trans('register.confirm_password')}}"
                                        />
                                        <span>
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <span class="second show-passowrd">
                                            <i
                                                class="fa-regular fa-eye-slash fa-flip-horizontal"
                                            ></i>
                                        </span>
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <button type="submit" class="custom-out-btn">
                                            {{trans('register.Sign Up')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="auth-logo">
                            <img src="{{asset('assets')}}/images/logo/Shanklbig.png" alt="shankal" />
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

           var lang = $('#startInn').data('langshankl')



            for (const key in data.areas) {

               var name = JSON.parse(data.areas[key].name);
               if (lang == 'ar') {
                your_html += "<option id='ar' value = " + data.areas[key].id + ">"+ name.ar +"</option>";
               }else{
                your_html += "<option id='ar' value = " + data.areas[key].id + ">"+ name.en +"</option>";
               }

            }
            $("#areaSelect").append(your_html);





        }

     })

  })


 </script>

 <script>
    $('#teacher-avatar').change(function() {

  var file = $('#teacher-avatar')[0].files[0].name;
  $("#imgName").text(file);
   });
 </script>



@endsection
