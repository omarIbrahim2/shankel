@props(['actionRoute'=> "th" , "guard" => "web" ])




<div class="left-side">
    @if (session()->has("error"))
    <div class="alert alert-success">
        {{session('error')}}
       </div>
    @endif
    <div class="section-title">
        <h2 class="text-start"> {{ trans('auth.changePass') }} </h2>
    </div>
    <div class="contact-form black-contact-form">
    
        <form method="POST" action="{{route($actionRoute , $guard)}}">
            @csrf

            @include('web.inc.errors')
            
            <div class="input-item me-auto ms-0">

                <input type="password" name="old_password" placeholder="{{ trans('auth.oldPass') }}">
                <span class="second show-passowrd">
                    <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                </span>
            </div>
            <div class="input-item me-auto ms-0">

                <input type="password" name="password" placeholder="{{ trans('auth.newPass') }}">
                <span class="second show-passowrd">
                    <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                </span>
            </div>
            <div class="input-item me-auto ms-0">

                <input type="password" name="password_confirmation" placeholder="{{ trans('auth.passConfirm') }}">
                <span class="second show-passowrd">
                    <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                </span>
            </div>

            <div class="input-item me-auto ms-0">
                <button type="submit" class="custom-out-btn">
                    {{ trans("auth.submit") }}
                </button>
            </div>

        </form>

    </div>
</div>