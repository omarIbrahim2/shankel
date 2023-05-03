@props(['actionRoute'=> "th" , "guard" => "web" ])




<div class="left-side">
    @if (session()->has("error"))
    <div class="alert alert-success">
        {{session('error')}}
       </div>
    @endif
    <div class="section-title">
        <h2 class="text-start">Change Password  </h2>
    </div>
    <div class="contact-form black-contact-form">
    
        <form method="POST" action="{{route($actionRoute , $guard)}}">
            @csrf

            @include('web.inc.errors')
            
            <div class="input-item me-auto ms-0">

                <input type="password" name="old_password" placeholder="Old Password">
                <span>
                    <i class="fa-regular fa-envelope"></i>
                </span>
            </div>
            <div class="input-item me-auto ms-0">

                <input type="password" name="password" placeholder="New Password">
                <span>
                    <i class="fa-regular fa-envelope"></i>
                </span>
            </div>
            <div class="input-item me-auto ms-0">

                <input type="password" name="password_confirmation" placeholder="password confirmation">
                <span>
                    <i class="fa-regular fa-envelope"></i>
                </span>
            </div>

            <div class="input-item me-auto ms-0">
                <button type="submit" class="custom-out-btn">
                    submit
                </button>
            </div>

        </form>

    </div>
</div>