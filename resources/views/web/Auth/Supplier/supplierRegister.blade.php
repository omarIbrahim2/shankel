@extends('web.layout')

@section('title')
SHANKL | Suppliers Registeration
@endsection

@section('nav')
<x-nav-guest />
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
                                        href="{{ route('supplier-login') }}">{{trans("register.ClickHere")}}</a></p>
                            </div>
                            <div class="contact-form black-contact-form">
                                @if (session()->has('status'))


                                <div class="alert alert-warning">
                                    <p>{{session()->get('status')}}</p>
                                </div>
                                @endif

                                <form method="POST" action="{{route('supplier-registeration')}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-item me-auto ms-0">
                                        <input type="text" name="name_en" value="{{old('name_en')}}"
                                            placeholder="{{ trans('supplier.name_en') }}">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        @error('name_en')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input type="text" name="name_ar" value="{{old('name_ar')}}"
                                            placeholder="{{ trans('supplier.name_ar') }}">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        @error('name_ar')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">

                                        <input type="email" name="email" value="{{old('email')}}"
                                            placeholder="{{ trans('register.email') }}">
                                        <span>
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input type="tel" name="phone" value="{{old('phone')}}"
                                            placeholder="{{ trans('register.phone') }}">
                                        <span>
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <select id="selectCity" class="form-select" aria-label="Default select example">
                                            <option selected disabled>{{trans('register.city')}}</option>
                                            @foreach ($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name()}}</option>
                                            @endforeach

                                        </select>
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                    </div>

                                    <div class="input-item me-auto ms-0">

                                        <select name="area_id" id="areaSelect" class="form-select"
                                            aria-label="Default select example">
                                            <option value="{{old('area_id')}}" selected disabled>
                                                {{trans('register.area')}}</option>
                                        </select>
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                        @error('area_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input value="{{old('type_en')}}" type="text" name="type_en"
                                            placeholder="{{ trans('supplier.type_en') }}">
                                        <span>
                                            <svg class="svg-inline--fa fa-sitemap" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="sitemap" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M208 80C208 53.49 229.5 32 256 32H320C346.5 32 368 53.49 368 80V144C368 170.5 346.5 192 320 192H312V232H464C494.9 232 520 257.1 520 288V320H528C554.5 320 576 341.5 576 368V432C576 458.5 554.5 480 528 480H464C437.5 480 416 458.5 416 432V368C416 341.5 437.5 320 464 320H472V288C472 283.6 468.4 280 464 280H312V320H320C346.5 320 368 341.5 368 368V432C368 458.5 346.5 480 320 480H256C229.5 480 208 458.5 208 432V368C208 341.5 229.5 320 256 320H264V280H112C107.6 280 104 283.6 104 288V320H112C138.5 320 160 341.5 160 368V432C160 458.5 138.5 480 112 480H48C21.49 480 0 458.5 0 432V368C0 341.5 21.49 320 48 320H56V288C56 257.1 81.07 232 112 232H264V192H256C229.5 192 208 170.5 208 144V80z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa-solid fa-sitemap"></i> Font Awesome fontawesome.com -->
                                        </span>
                                        @error('type_en')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <input value="{{old('type_ar')}}" type="text" name="type_ar"
                                            placeholder="{{ trans('supplier.type_ar') }}">
                                        <span>
                                            <svg class="svg-inline--fa fa-sitemap" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="sitemap" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M208 80C208 53.49 229.5 32 256 32H320C346.5 32 368 53.49 368 80V144C368 170.5 346.5 192 320 192H312V232H464C494.9 232 520 257.1 520 288V320H528C554.5 320 576 341.5 576 368V432C576 458.5 554.5 480 528 480H464C437.5 480 416 458.5 416 432V368C416 341.5 437.5 320 464 320H472V288C472 283.6 468.4 280 464 280H312V320H320C346.5 320 368 341.5 368 368V432C368 458.5 346.5 480 320 480H256C229.5 480 208 458.5 208 432V368C208 341.5 229.5 320 256 320H264V280H112C107.6 280 104 283.6 104 288V320H112C138.5 320 160 341.5 160 368V432C160 458.5 138.5 480 112 480H48C21.49 480 0 458.5 0 432V368C0 341.5 21.49 320 48 320H56V288C56 257.1 81.07 232 112 232H264V192H256C229.5 192 208 170.5 208 144V80z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa-solid fa-sitemap"></i> Font Awesome fontawesome.com -->
                                        </span>
                                        @error('type_ar')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <input value="{{old('orgName_en')}}" type="text" name="orgName_en"
                                            placeholder="{{ trans('supplier.orgName_en') }}">
                                        <span>
                                            <svg class="svg-inline--fa fa-truck" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="truck" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M368 0C394.5 0 416 21.49 416 48V96H466.7C483.7 96 499.1 102.7 512 114.7L589.3 192C601.3 204 608 220.3 608 237.3V352C625.7 352 640 366.3 640 384C640 401.7 625.7 416 608 416H576C576 469 533 512 480 512C426.1 512 384 469 384 416H256C256 469 213 512 160 512C106.1 512 64 469 64 416H48C21.49 416 0 394.5 0 368V48C0 21.49 21.49 0 48 0H368zM416 160V256H544V237.3L466.7 160H416zM160 368C133.5 368 112 389.5 112 416C112 442.5 133.5 464 160 464C186.5 464 208 442.5 208 416C208 389.5 186.5 368 160 368zM480 464C506.5 464 528 442.5 528 416C528 389.5 506.5 368 480 368C453.5 368 432 389.5 432 416C432 442.5 453.5 464 480 464z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa-solid fa-truck"></i> Font Awesome fontawesome.com -->
                                        </span>
                                        @error('orgName_en')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <input value="{{old('orgName_ar')}}" type="text" name="orgName_ar"
                                            placeholder="{{ trans('supplier.orgName_ar') }}">
                                        <span>
                                            <svg class="svg-inline--fa fa-truck" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="truck" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M368 0C394.5 0 416 21.49 416 48V96H466.7C483.7 96 499.1 102.7 512 114.7L589.3 192C601.3 204 608 220.3 608 237.3V352C625.7 352 640 366.3 640 384C640 401.7 625.7 416 608 416H576C576 469 533 512 480 512C426.1 512 384 469 384 416H256C256 469 213 512 160 512C106.1 512 64 469 64 416H48C21.49 416 0 394.5 0 368V48C0 21.49 21.49 0 48 0H368zM416 160V256H544V237.3L466.7 160H416zM160 368C133.5 368 112 389.5 112 416C112 442.5 133.5 464 160 464C186.5 464 208 442.5 208 416C208 389.5 186.5 368 160 368zM480 464C506.5 464 528 442.5 528 416C528 389.5 506.5 368 480 368C453.5 368 432 389.5 432 416C432 442.5 453.5 464 480 464z">
                                                </path>
                                            </svg>
                                            <!-- <i class="fa-solid fa-truck"></i> Font Awesome fontawesome.com -->
                                        </span>
                                        @error('orgName_ar')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>


                                    <div class="upload-avatar text-start">
                                        <input type="file" name="image" id="teacher-avatar" />
                                        <div class="uploadedPhotoName">
                                        <label class="btn-custom" for="teacher-avatar">{{ trans('supplier.upload') }}</label>
                                        <p id="imgName"></p>
                                        </div>
                                        <div class="files-names"></div>
                                        @error('image')
                                                <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input type="password" name="password"
                                            placeholder="{{ trans('supplier.password') }}">
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
                                        <input type="password" name="password_confirmation"
                                            placeholder="{{ trans('auth.passConfirm') }}">
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
    var url = '{{ route("areas", ":id") }}';
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

            var lang = $('#startInn').data('langshankl')



            for (const key in data.areas) {

                var name = JSON.parse(data.areas[key].name);
                if (lang == 'ar') {
                    your_html += "<option id='ar' value = " + data.areas[key].id + ">" + name.ar +
                        "</option>";
                } else {
                    your_html += "<option id='ar' value = " + data.areas[key].id + ">" + name.en +
                        "</option>";
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
