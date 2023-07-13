@extends('web.layout')

@section('title')
    SHANKL | Schools Registeration
@endsection

@section('nav')
<x-nav-guest/>
@endsection

@section('main')
    <main class="colored-section">
        <nav class="sub-nav">
            <div class="container">
                <ul class="justify-content-center">
                    <li><img src="{{ asset('assets') }}/images/logo/Shankal.png" alt="shankal"></li>
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
                                    <h2 class="text-start">{{ trans('register.Sign Up') }}</h2>
                                    <p class="text-start p-0">{{trans("auth.LoginToYourAccount")}} <a
                                            href="{{ route('school-login') }}">{{trans("register.ClickHere")}}</a></p>
                                </div>
                                <div class="contact-form black-contact-form">
                                      @if (session()->has('status'))


                                       <div class="alert alert-warning">
                                            <p>{{session()->get('status')}}</p>
                                       </div>
                                       @endif

                                    <form method="POST" action="{{route('school-register')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-item me-auto ms-0">
                                            <input type="text" name="name" value="{{old('name')}}" placeholder="{{ trans('register.name') }}"
                                                >
                                            <span>
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">

                                            <input type="email" name="email" value="{{old('email')}}" placeholder="{{ trans('register.email') }}" >
                                            <span>
                                                <i class="fa-regular fa-envelope"></i>
                                            </span>
                                            @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">
                                            <input type="tel" name="phone" value="{{old('phone')}}" placeholder="{{ trans('register.phone') }}">
                                            <span>
                                                <i class="fa-solid fa-phone"></i>
                                            </span>
                                            @error('phone')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">
                                            <select id="selectCity" class="form-select" aria-label="Default select example" >
                                                <option selected  disabled>{{trans('register.city')}}</option>
                                                @foreach ($cities as $city)
                                                   <option value="{{$city->id}}">{{$city->name()}}</option>
                                                @endforeach

                                              </select>
                                            <span>
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                        </div>

                                        <div class="input-item me-auto ms-0">

                                            <select name="area_id" id="areaSelect" class="form-select" aria-label="Default select example" >
                                                <option value="{{old('area_id')}}" selected disabled>{{trans('register.area')}}</option>
                                              </select>
                                            <span>
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                            @error('area_id')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">
                                            <input placeholder="Date Of establishment" value="{{old('establish_date')}}" class="textbox-n" type="text"
                                                name="establish_date" id="date" />
                                            <span>
                                                <i class="fa-regular fa-calendar-days"></i>
                                            </span>
                                            @error('establish_date')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">
                                            <select id="selectEduSystem" class="form-select" aria-label="Default select example" name="edu_systems_id" >
                                                <option  selected disabled>{{ trans('school.eduSystem') }} </option>
                                                @foreach ($eSystems as $system)
                                                   <option {{old("edu_systems_id") == $system->id ? 'selected' : ''}} value="{{$system->id}}">{{$system->name()}}</option>
                                                @endforeach

                                              </select>
                                            <span>
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                            @error("edu_systems_id")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0 ">
                                            <h4>
                                                {{ trans('school.schoolGrades') }}
                                            </h4>
                                            <div class="select-cont">
                                                @foreach ($grades as $grade)

                                                <div class="checkbox">
                                                    <input type="checkbox" name="grade_id[]" value="{{$grade->id}}"
                                                        id="{{$grade->name()}}" @if(is_array(old('grade_id')) && in_array($grade->id, old('grade_id'))) checked @endif>
                                                    <label for="{{$grade->name()}}">
                                                        {{$grade->name()}}
                                                    </label>
                                                </div>
                                                @endforeach

                                            </div>
                                            @error('grade_id')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="upload-avatar text-start">
                                            <input type="file" name="image"  id="teacher-avatar" multiple>
                                            <label class="btn-custom" for="teacher-avatar">{{ trans('school.uploadNew') }}</label>
                                            <div class="files-names">

                                            </div>
                                            @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">
                                            <input type="password" name="password" placeholder="{{ trans('auth.password') }}" >
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
                                            <input type="password" name="password_confirmation" placeholder="{{ trans('auth.passConfirm') }}"
                                                >
                                            <span>
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                            <span class="second show-passowrd">
                                                <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                            </span>
                                            @error('password_confirmation')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="auth text-start">
                                            <p class="text-start p-0">{{ trans('register.signUpAs') }}</p>
                                        </div>
                                        <div class="input-item me-auto ms-0 radios school-type">

                                            <div class="radio">
                                                <input type="radio" name="type" value="School"
                                                  id="school">
                                                <label class="custom-out-btn  @if(old('type') == 'School')
                                                radio-checked
                                            @endif" for="school">{{ trans('register.School') }}</label>
                                            </div>

                                            <div class="radio">
                                                <input type="radio" name="type" value="Center"
                                                 id="center">
                                                <label class="custom-out-btn  @if(old('type') == 'Center')
                                                radio-checked
                                            @endif" for="center">{{ trans('register.center') }}</label>
                                            </div>

                                            <div class="radio">
                                                <input type="radio" name="type" value="KG"
                                             id="kg">
                                                <label class="custom-out-btn @if(old('type') == 'KG')
                                                    radio-checked
                                                @endif" for="kg">{{ trans('register.kg') }}</label>
                                            </div>
                                            @error('type')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror

                                        </div>

                                        <div class="input-item me-auto ms-0">
                                            <input value="{{old('free_seats')}}" type="number" name="free_seats" placeholder="{{ trans('school.freeSeats') }}"
                                                >
                                            <span>
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            @error('free_seats')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-item me-auto ms-0">
                                            <button type="submit" class="custom-out-btn">
                                                {{ trans('register.Sign Up') }}
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-12">
                            <div class="auth-logo">
                                <img src="{{ asset('assets') }}/images/logo/Shanklbig.png" alt="shankal">
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
        $("#selectCity").on('change', function() {
            let cityId = this.value;
            var url = '{{ route('areas', ':id') }}';
            url = url.replace(':id', cityId);

            $.ajax({
                type: 'GET',

                url: url,

                processData: false,

                contentType: 'application/json',

                cache: false,

                success: function(data) {
                    var your_html = "";
                    $("#areaSelect").empty();
                    $("#areaSelect").append("<option selected disabled>Area</option>");
                    for (const key in data.areas) {


                        your_html += "<option id='ar' value = " + data.areas[key].id + ">" + data.areas[
                            key].name + "</option>";
                    }
                    $("#areaSelect").append(your_html);





                }

            })

        })
    </script>
@endsection
