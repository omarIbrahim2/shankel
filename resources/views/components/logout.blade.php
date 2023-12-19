@props(['guard' => "web"])

<form id="outForm" action="{{route('logout' , $guard)}}" method="post">
    @csrf
</form>
<button form="outForm" class="custom-out-btn" type="submit">{{trans("auth.Sign out")}}</button>
