<nav class="navbar navbar-expand-lg navbar-light auth-nav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('assets')}}/images/logo/logo.png" alt="shankal">
        </a>
        <div class="auth-btn">

             <x-logout :guard=$guard />
            <a class="icons" href="{{ route('Card') }}">
                <svg class="svg-inline--fa fa-cart-shopping" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-shopping" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"></path></svg><!-- <i class="fa-solid fa-cart-shopping"></i> Font Awesome fontawesome.com -->
            </a>

              <x-lang/>

             @if ($guard == 'web')
             <a class="icons" href="{{route('dashboard')}}">
                <img src="{{asset('assets')}}/images/logo/Shanklbig.png" style="width: 70px" alt="user avatar" title="user profile">
             </a>
             @else
             <a class="icons profile_photo" href="{{route($guard.'-profile')}}">
                <img src="{{asset(auth()->guard($guard)->user()->image)}}" style="width: 70px" style=" border-radius: 50%" alt="user avatar" title="user profile">
             </a>
             @endif

        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                @if ($guard == 'web')
                <li class="nav-item">
                    <a class="nav-link active" aria-current="" href="{{route('home')}}">{{trans("nav.Home")}}</a>
                </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="" href="{{route($guard)}}">{{trans("nav.Home")}}</a>
                  </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-services')}}">{{trans("nav.Services")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-events')}}">{{trans("nav.Events")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-addverts')}}">{{trans("nav.Addverts")}}</a>
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

            </ul>
        </div>

    </div>
</nav>
