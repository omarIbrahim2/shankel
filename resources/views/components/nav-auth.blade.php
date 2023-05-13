<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset("assets")}}/images/logo/logo.png" alt="shankal">
        </a>
        <div class="auth-btn">
            
             <x-logout :guard=$guard />
            <a class="icons" href="#">
                <svg class="svg-inline--fa fa-cart-shopping" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-shopping" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"></path></svg><!-- <i class="fa-solid fa-cart-shopping"></i> Font Awesome fontawesome.com -->
            </a>
            {{-- <a class="icons m-0 noti-icon" href="#">
                <svg class="svg-inline--fa fa-bell" aria-hidden="true" focusable="false" data-prefix="far" data-icon="bell" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 32V49.88C328.5 61.39 384 124.2 384 200V233.4C384 278.8 399.5 322.9 427.8 358.4L442.7 377C448.5 384.2 449.6 394.1 445.6 402.4C441.6 410.7 433.2 416 424 416H24C14.77 416 6.365 410.7 2.369 402.4C-1.628 394.1-.504 384.2 5.26 377L20.17 358.4C48.54 322.9 64 278.8 64 233.4V200C64 124.2 119.5 61.39 192 49.88V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32V32zM216 96C158.6 96 112 142.6 112 200V233.4C112 281.3 98.12 328 72.31 368H375.7C349.9 328 336 281.3 336 233.4V200C336 142.6 289.4 96 232 96H216zM288 448C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288z"></path></svg><!-- <i class="fa-regular fa-bell"></i> Font Awesome fontawesome.com -->
                </a><div class="notification"><a class="icons m-0 noti-icon" href="#">
                    </a><ul><a class="icons m-0 noti-icon" href="#">
                        </a><li><a class="icons m-0 noti-icon" href="#">
                            </a><a href="#">
                                <img src="assets/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/logo/noti.png" alt="notification icon">
                                <h5 class="not-author">@hussien</h5>
                                <p class="not-action">see your request</p>
                            </a>
                        </li>
                        <li class="border-0">
                            <a href="#">
                                
                                <p class="not-action">All Notificaation</p>
                            </a>
                        </li>
                    </ul>
                </div> --}}

              <x-lang/>  
            
             @if ($guard == 'web')
             <a class="icons" href="{{route("dashboard")}}">
                <img src="{{asset("assets")}}/images/logo/Shanklbig.png" style="width: 70px" alt="user avatar">
             </a> 
             @else
             <a class="icons profile_photo" href="{{route($guard."-profile")}}">
                <img src="{{asset(auth()->guard($guard)->user()->image)}}" style="width: 70px" style=" border-radius: 50%" alt="user avatar">
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
                    <a class="nav-link active" aria-current="{{route('dashboard')}}" href="">{{trans("nav.Home")}}</a>
                </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="" href="{{route($guard)}}">{{trans("nav.Home")}}</a>
                  </li>
                @endif
               
                @if ($guard == 'web')
                 <li class="nav-item">
                   
                    <a class="nav-link" href="{{route('dashboard')}}">{{trans("nav.Profile")}}</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{route($guard."-profile")}}">{{trans("nav.Profile")}}</a>
                  </li>
                @endif
                
               
                <li class="nav-item">
                    <a class="nav-link" href="{{route("web-services")}}">{{trans("nav.Services")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("web-events")}}">{{trans("nav.Events")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('web-schools')}}">{{trans("nav.Schools")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">{{trans("nav.Teachers")}}</a>
                </li>
                
            </ul>
        </div>

    </div>
</nav>