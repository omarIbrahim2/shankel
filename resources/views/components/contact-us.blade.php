    <!-- contact us -->
    <section class="section colored-section p-0 contact-us" id="contact">
        <div class="inner">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="contacts-container">
                        <div class="contacts">
                            <div class="contact-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <a href="https://goo.gl/maps/629oZPALLVBQkjya7">
                                    {{ trans("contact.shanklAdd") }}
                                </a>
                            </div>
                            <div class="contact-item">
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:+962 6 5669933">
                                    +962 6 5669933
                                </a>
                            </div>
                            <div class="contact-item">
                                <i class="fa-regular fa-envelope"></i>
                                <a href="mailto:shankal@gmail.com">
                                    shankal@gmail.com
                                </a>
                            </div>
                        </div>
                        <div class="social">
                            <div class="section-title">
                                <h2>{{ trans('contact.follow') }}</h2>
                            </div>
                            <div class="social-icons">
                                <div class="social-item">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                </div>
                                <div class="social-item">
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                </div>
                               
                                <div class="social-item">
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                </div>

                                <div class="social-item">
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
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