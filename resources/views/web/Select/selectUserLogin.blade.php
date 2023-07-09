@extends('web.layout')

@section('title')
    SHANKAL
@endsection
@section('nav')
    <x-nav-guest/>
@endsection
@section('main')
<main class="colored-section">

    <section class="section select-user">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>{{trans('register.selectUser')}}</h2>
                </div>
                <div class="user-levels">
                    <a href="{{route('parent-login')}}" class="user-level">
                        <div class="level-img">
                            <img src="{{asset('assets')}}/images/user/Group.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>{{trans('register.Parent')}}</h3>
                        </div>
                    </a>

                    <a href="{{route('school-login')}}" class="user-level">
                        <div class="level-img">
                            <img src="{{asset("assets")}}/images/user/Vector2.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>{{trans('register.School')}}</h3>
                        </div>
                    </a>
                    <a href="{{route('teacher-login')}}" class="user-level">
                        <div class="level-img">
                            <img src="{{asset("assets")}}/images/user/teach.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>{{trans('register.Teacher')}}</h3>
                        </div>
                    </a>
                    <a href="{{route('supplier-login')}}" class="user-level">
                        <div class="level-img">
                            <img src="{{asset("assets")}}/images/user/Vector.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>{{trans('register.Supplier')}}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
