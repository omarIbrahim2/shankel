    <!-- footer -->
    <footer class="footer">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <img src="{{asset('assets')}}/images/logo/logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="footer-nav">
                            <ul class="navbar-nav m-auto">


                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('web-services')}}">{{trans("nav.Services")}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('web-events')}}">{{trans("nav.Events")}}</a>
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
                    <div class="col-md-2">
                        <div class="custom-logo">
                            <img src="{{asset('assets')}}/images/logo/Shankal.png" alt="shankal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
