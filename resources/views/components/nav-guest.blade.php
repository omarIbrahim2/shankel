<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('assets')}}/images/logo/logo.png" alt="shankal">
        </a>
        <div class="auth-btn">
            <a href="{{ route('selectUserRegister') }}" class="custom-out-btn">
                {{trans("auth.Sign up")}}
            </a>
            <a href="{{ route('selectUserLogin') }}" class="custom-out-btn">
                {{trans("auth.Sign in")}}
            </a>
             <x-lang/>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">{{trans("nav.Home")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-schools')}}">{{trans("nav.Schools")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web-teachers') }}">{{trans("nav.Teachers")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web-suppliers') }}">{{ trans('nav.Suppliers') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-services')}}">{{trans("nav.Services")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-events')}}">{{trans("nav.Events")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-addverts')}}">{{trans("nav.Addverts")}}</a>
                </li>
                
            </ul>
        </div>

    </div>
</nav>
