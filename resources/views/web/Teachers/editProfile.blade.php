@extends('web.layout');

@section('nav')
<x-nav-auth></x-nav-auth>
@endsection




@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
            {{-- <form>
                <div class="section-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-12">
                            <div class="left-side">
                                <div class="sub-title">
                                    <h3>Profile</h3>
                                </div>
                                <div class="teacher-avatar">
                                    <img src="assets/images/user/Ellipse.webp" alt="avatar">
                                    <h4>
                                        <a href="#">Noha Yasser</a>
                                    </h4>
                                    <p>Math Teacher</p>
                                    <div class="avatar-btns">
                                        <div class="upload-avatar">
                                            <input type="file" name="teacher-avatar" id="teacher-avatar">
                                            <label class="btn-custom" for="teacher-avatar">Upload New Avatar</label>
                                        </div>
                                        <div>
                                            <a href="#" class="custom-out-btn">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-video">
                                    <div class="sub-title sec-sub-title">
                                        <h3>Add Video</h3>
                                    </div>
                                    <div class="avatar-btns">
                                        <div class="upload-avatar">
                                            <input type="file" name="teacher-avatar" id="teacher-avatar">
                                            <label class="btn-custom" for="teacher-avatar">Upload New Video</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-video">
                                    <div class="sub-title sec-sub-title">
                                        <h3>Add Free Courses</h3>
                                    </div>
                                    <div class="avatar-btns">
                                        <div class="upload-avatar">
                                            <input type="file" name="teacher-avatar" id="teacher-avatar">
                                            <label class="btn-custom" for="teacher-avatar">Upload New Video</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="create-metting">
                                    <div class="sub-title sec-sub-title">
                                        <h3>create New Meeting</h3>
                                    </div>
                                    <div class="contact-form ">
                                        
                                            <div class="input-item">
                                                <input type="text" name="lecture-name" placeholder="Lecture Name">
                                                <span>
                                                    <svg class="svg-inline--fa fa-book-open-reader" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-open-reader" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 219.2v212.5c0 14.25 11.62 26.25 26.5 27C75.32 461.2 180.2 471.3 240 511.9V245.2C181.4 205.5 79.99 194.8 29.84 192C13.59 191.1 0 203.6 0 219.2zM482.2 192c-50.09 2.848-151.3 13.47-209.1 53.09C272.1 245.2 272 245.3 272 245.5v266.5c60.04-40.39 164.7-50.76 213.5-53.28C500.4 457.9 512 445.9 512 431.7V219.2C512 203.6 498.4 191.1 482.2 192zM352 96c0-53-43-96-96-96S160 43 160 96s43 96 96 96S352 149 352 96z"></path></svg><!-- <i class="fa-solid fa-book-open-reader"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            
                                            <div class="input-item">
                                                <input type="time" name="time" placeholder="Time">
                                                <span>
                                                    <svg class="svg-inline--fa fa-clock" aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path></svg><!-- <i class="fa-regular fa-clock"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            
                                            
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7  col-12">
                            <div class="right-side">
                                <div class="right-side-item">
                                    <div class="sub-title main-sub-title">
                                        <h3>Basic Info</h3>
                                        <div class="sub-btns">
                                            <a href="#" class="custom-out-btn">Cancel</a>
                                            <button type="submit" class="btn-custom">Save</button>
                                        </div>
                                    </div>
                                    <div class="contact-form ">
                                        <form>
                                            <div class="input-item">
                                                <input type="text" name="name" placeholder="name">
                                                <span>
                                                    <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path></svg><!-- <i class="fa-solid fa-user"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            
                                            <div class="input-item">
                                                <input type="email" name="email" placeholder="email">
                                                <span>
                                                    <svg class="svg-inline--fa fa-envelope" aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 128C0 92.65 28.65 64 64 64H448C483.3 64 512 92.65 512 128V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V128zM48 128V150.1L220.5 291.7C241.1 308.7 270.9 308.7 291.5 291.7L464 150.1V127.1C464 119.2 456.8 111.1 448 111.1H64C55.16 111.1 48 119.2 48 127.1L48 128zM48 212.2V384C48 392.8 55.16 400 64 400H448C456.8 400 464 392.8 464 384V212.2L322 328.8C283.6 360.3 228.4 360.3 189.1 328.8L48 212.2z"></path></svg><!-- <i class="fa-regular fa-envelope"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            <div class="input-item">
                                                <input type="text" name="subject" placeholder="subject">
                                                <span>
                                                    <svg class="svg-inline--fa fa-book" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M448 336v-288C448 21.49 426.5 0 400 0H96C42.98 0 0 42.98 0 96v320c0 53.02 42.98 96 96 96h320c17.67 0 32-14.33 32-31.1c0-11.72-6.607-21.52-16-27.1v-81.36C441.8 362.8 448 350.2 448 336zM143.1 128h192C344.8 128 352 135.2 352 144C352 152.8 344.8 160 336 160H143.1C135.2 160 128 152.8 128 144C128 135.2 135.2 128 143.1 128zM143.1 192h192C344.8 192 352 199.2 352 208C352 216.8 344.8 224 336 224H143.1C135.2 224 128 216.8 128 208C128 199.2 135.2 192 143.1 192zM384 448H96c-17.67 0-32-14.33-32-32c0-17.67 14.33-32 32-32h288V448z"></path></svg><!-- <i class="fa-solid fa-book"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            <div class="input-item ">
                                                <input type="tel" name="phone" placeholder="phone">
                                                <span>
                                                    <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path></svg><!-- <i class="fa-solid fa-phone"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                                <div class="right-side-item">
                                    <div class="sub-title main-sub-title">
                                        <h3>About Me</h3>
                                        
                                    </div>
                                    <div class="contact-form ">
                                        
                                            <div class="input-item ">
                                                <input type="file" name="profile" id="parent-profile">
    
                                                <label class="file-input" for="parent-profile">
                                                    <span>
                                                        <svg class="svg-inline--fa fa-file-pen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V299.6L289.3 394.3C281.1 402.5 275.3 412.8 272.5 424.1L257.4 484.2C255.1 493.6 255.7 503.2 258.8 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM564.1 250.1C579.8 265.7 579.8 291 564.1 306.7L534.7 336.1L463.8 265.1L493.2 235.7C508.8 220.1 534.1 220.1 549.8 235.7L564.1 250.1zM311.9 416.1L441.1 287.8L512.1 358.7L382.9 487.9C378.8 492 373.6 494.9 368 496.3L307.9 511.4C302.4 512.7 296.7 511.1 292.7 507.2C288.7 503.2 287.1 497.4 288.5 491.1L303.5 431.8C304.9 426.2 307.8 421.1 311.9 416.1V416.1z"></path></svg><!-- <i class="fa-solid fa-file-pen"></i> Font Awesome fontawesome.com -->
                                                    </span>
                                                    <p class="upload-text">Upload Profile</p>
                                                    
                                                </label>
                                            </div>
                                            
                                       
                                    </div>
                                </div>
                                <div class="right-side-item">
                                    <div class="sub-title main-sub-title">
                                        <h3>External Links</h3>
                                        
                                    </div>
                                    <div class="contact-form ">
                                       
                                            <div class="input-item">
                                                <input type="url" name="facebook" placeholder="Facebook URL">
                                                <span>
                                                    <svg class="svg-inline--fa fa-facebook-f" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M279.1 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.4 0 225.4 0c-73.22 0-121.1 44.38-121.1 124.7v70.62H22.89V288h81.39v224h100.2V288z"></path></svg><!-- <i class="fa-brands fa-facebook-f"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            
                                            <div class="input-item">
                                                <input type="url" name="twitter" placeholder="Twitter URL">
                                                <span>
                                                    <svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path></svg><!-- <i class="fa-brands fa-twitter"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            <div class="input-item">
                                                <input type="url" name="gmail" placeholder="GMail URL">
                                                <span>
                                                    <svg class="svg-inline--fa fa-m" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="m" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M448 64.01v384c0 17.67-14.31 32-32 32s-32-14.33-32-32V169.7l-133.4 200.1c-11.88 17.81-41.38 17.81-53.25 0L64 169.7v278.3c0 17.67-14.31 32-32 32s-32-14.33-32-32v-384c0-14.09 9.219-26.55 22.72-30.63c13.47-4.156 28.09 1.141 35.91 12.88L224 294.3l165.4-248.1c7.812-11.73 22.47-17.03 35.91-12.88C438.8 37.47 448 49.92 448 64.01z"></path></svg><!-- <i class="fa-solid fa-m"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            <div class="input-item ">
                                                <input type="url" name="linkedin" placeholder="Linkedin URL">
                                                <span>
                                                    <svg class="svg-inline--fa fa-linkedin-in" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path></svg><!-- <i class="fa-brands fa-linkedin-in"></i> Font Awesome fontawesome.com -->
                                                </span>
                                            </div>
                                            <div class="input-item custom-save">
                                                <button type="submit" class="custom-out-btn btn-form">
                                                    save
                                                </button>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form> --}}

            @livewire('teacher.edit-teacher', ['authUser' => $authUser])
            
        </div>
    </div>
</section>

@endsection