@if (App::getLocale() == 'ar')
<a href="{{ route('lang', 'en') }}" class="lang-btn custom-out-btn">
    EN
</a>
@else
<a href="{{ route('lang', 'ar') }}" class="lang-btn custom-out-btn">
    AR
</a>
@endif