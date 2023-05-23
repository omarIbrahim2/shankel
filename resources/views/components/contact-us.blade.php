    <!-- contact us -->
    <section class="section colored-section p-0 contact-us" id="contact">
        <div class="inner">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    @if ($Social != null)
                    <div class="contacts-container">
                            
                        <div class="contacts">
                            @if ($Social->address) 
                            <div class="contact-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <a href="https://goo.gl/maps/629oZPALLVBQkjya7" target="_blank">
                                    {{$Social->address}}
                                </a>
                            </div>
                            @endif
                            @if ($Social->phone)
                            <div class="contact-item">
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:+962 6 5669933" target="_blank">
                                    +962 6 {{$Social->phone}}
                                </a>    
                            </div>
                            @endif
                            @if ($Social->email)
                            <div class="contact-item">
                                <i class="fa-regular fa-envelope"></i>
                                <a href="mailto:shankal@gmail.com">
                                    {{ $Social->email}}
                                </a>    
                            </div>
                            @endif
                        </div>
                        <div class="social">
                            <div class="section-title">
                                <h2>{{ trans('contact.follow') }}</h2>
                            </div>
                            
                            <div class="social-icons justify-content-sm-around">
                                @if ($Social->facebook)
                                <div class="social-item">
                                    <a href="{{$Social->facebook}}"target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                                @endif
                                @if ($Social->twitter)
                                <div class="social-item">
                                    <a href="{{$Social->twitter}}"target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                </div>
                                @endif
                                
                                @if ($Social->instagram)
                                <div class="social-item">
                                    <a href="{{$Social->instagram}}"target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                                @endif
                                
                                @if ($Social->Linkedin)
                                <div class="social-item">
                                    <a href="{{$Social->Linkedin}}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="section contact-form-container">
                        <div class="section-title ">
                            <h2 class="text-start">{{ trans("contact.contact") }}</h2>
                        </div>
                        @livewire('web.contact-us')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****************** -->