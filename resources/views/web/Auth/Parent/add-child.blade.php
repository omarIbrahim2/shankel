@extends('web.layout')
@section('title')
    SHANKAL | Add Your Child

@endsection

@section('nav')
<x-nav-auth></x-nav-auth>
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
                                <h2 class="text-start">{{ trans('parent.addkids') }}</h2>
                                <p class="text-start p-0">{{ trans('parent.mustAddC') }}</p>
                            </div>
                            <div class="contact-form black-contact-form">
                                <form method="POST" action="{{url('add/child')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input value="{{$parent_id}}" type="hidden" name="parentt_id">
                                    <div class="input-item me-auto ms-0">
                                        <input type="text"value="{{old('name')}}" name="name" placeholder="{{ trans('parent.name') }}">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">

                                        <input type="number"value="{{old('age')}}" name="age" placeholder="{{ trans('parent.age') }}">
                                        <span>
                                            <i class="fa-regular fa-hourglass"></i>
                                        </span>
                                        @error('age')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <select name="birth_date" placeholder="MM">
                                            <option selected disabled aria-hidden="true">MM</option>
                                            <option {{old('birth_date') == 'January' ? 'selected' : ''}}  value="January">Jan</option>
                                            <option {{old('birth_date') == 'February' ? 'selected' : ''}} value="February">Feb</option>
                                            <option {{old('birth_date') == 'March' ? 'selected' : ''}} value="March">Mar</option>
                                            <option {{old('birth_date') == 'April' ? 'selected' : ''}} value="April">Apr</option>
                                              <option name="May" {{old('birth_date') == 'May' ? 'selected' : ''}} value="May">May</option>
                                            <option {{old('birth_date') == 'June' ? 'selected' : ''}} value="June">Jun</option>
                                            <option {{old('birth_date') == 'July' ? 'selected' : ''}} value="July">Jul</option>
                                            <option {{old('birth_date') == 'August' ? 'selected' : ''}} value="August">Aug</option>
                                              <option {{old('birth_date') == 'September' ? 'selected' : ''}} value="September">Sep</option>
                                            <option {{old('birth_date') == 'October' ? 'selected' : ''}} value="October">Oct</option>
                                            <option {{old('birth_date') == 'November' ? 'selected' : ''}} value="November">Nov</option>
                                            <option {{old('birth_date') == 'December' ? 'selected' : ''}} value="December">Dec</option>
                                          </select>

                                        <span>
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                        @error('birth_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <select  name="grade_id" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled>{{ trans('parent.grade') }}</option>
                                            @foreach ($grades as $grade)
                                               <option {{old('grade_id') == $grade->id ? 'selected' : ''}} value="{{$grade->id}}">{{$grade->name()}}</option>
                                            @endforeach

                                        </select>
                                        <span>
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </span>

                                    </div>



                                    <div class="social-auth">
                                        <div class="social-btns">
                                            <div class="input-item m-0 mb-3 charcter">
                                                <input  type="radio" name="gender" value="male" id="male">
                                                <label for="male" class="icon-animate">
                                                    <img src="{{asset('assets')}}/images/charcters/shankal.png" alt="shankal">
                                                    <span><i class="fa-solid fa-check"></i></span>
                                                </label>

                                            </div>
                                            <div class="input-item m-0 mb-3 charcter">
                                                <input type="radio" name="gender" value="female" id="female">
                                                <label for="female" class="icon-animate">
                                                    <img  src="{{asset('assets')}}/images/charcters/shankola.png" alt="shankola">
                                                    <span><i class="fa-solid fa-check"></i></span>
                                                </label>

                                            </div>
                                        </div>
                                        @error('gender')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <button type="submit" class="custom-out-btn">
                                            {{ trans('parent.addChild') }}
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
