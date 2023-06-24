<div class="inner">
    <div class="container">
        <div class="section-title">
            <h2>{{ trans("home.AboutUs") }}</h2>
        </div>
        <div class="section-content">
            <div class="about-welcome">
                @if ($Infos)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="welcome">
                            
                            <h3>{{ $Infos->title(App::getLocale()) }}</h3>
                        </div>
                        <p>
                            {{ $Infos->aboutUs(App::getLocale()) }}
                        </p>
                    </div>
                    <div class="col-lg-6 order-lg-0 order-first">
                        <img src="{{ asset($Infos->image) }}" alt="about us">
                    </div>
                </div>
                @endif
               
            </div>
            @if ($Infos)
            <div class="about-points">
                <div class="row">
                    <div class="col-md-4">
                        <div class="about-point">
                            <h4>
                               {{ trans("home.WhyChooseUs") }}
                            </h4>
                            <p>
                                {{ $Infos->choose(App::getLocale()) }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-point">
                            <h4>
                                {{ trans("home.OurMission") }}
                            </h4>
                            <p>
                                {{ $Infos->mission(App::getLocale()) }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-point">
                            <h4>
                                {{ trans("home.OurVision") }}
                            </h4>
                            <p>
                                {{ $Infos->vision(App::getLocale()) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
    </div>
</div>