@extends('web.layout')

@section('styles')
    @livewireScripts
@endsection

@section('main')
<main class="colored-section">
    <nav class="sub-nav">
        <div class="container">
            <ul class="justify-content-center">
                <li><img src="assets/images/logo/Shankal.png" alt="shankal"></li>
            </ul>
        </div>
    </nav>
    <section class="section parent-edit-profile">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-12 mb-s-0 mb-3">
                        <!-- <div class="from-container">
                            <div class="contact-form black-contact-form">
                                <form>
                                    <div class="input-item me-auto ms-0">
                                        <input type="text" name="name" placeholder="name" value="hussien mohamed">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto ms-0">

                                        <input type="email" name="email" placeholder="email"
                                            value="hussienmo385@gmail.com">
                                        <span>
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto m-0">
                                        <input type="tel" name="phone" placeholder="phone" value="123456789">
                                        <span>
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <label>Gender</label>
                                        <div
                                            class="d-flex align-items-center justify-content-start"
                                        >
                                            <div
                                                class="d-flex align-items-center justify-content-start"
                                            >
                                                <label for="male">Male</label>
                                                <input
                                                    type="radio"
                                                    value="male"
                                                    name="gender"
                                                    class="not-hidden ms-2"
                                                    id="male"
                                                />
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-start ms-2"
                                            >
                                                <label for="female">Female</label>
                                                <input
                                                    type="radio"
                                                    value="female"
                                                    name="gender"
                                                    class="not-hidden ms-2"
                                                    id="female"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input type="password" name="password" placeholder="password"
                                            value="123456">
                                        <span>
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <span class="second show-passowrd">
                                            <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input type="password" name="confirmPassword" placeholder="Confirm Password"
                                            value="123456">
                                        <span>
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                        <span class="second show-passowrd">
                                            <i class="fa-regular fa-eye-slash fa-flip-horizontal"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto m-0">
                                        <input type="tel" name="phone" placeholder="phone" value="123456789">
                                        <span>
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto ms-0 mt-32">
                                        <input type="file" name="profile" id="parent-profile">

                                        <label class="file-input" for="parent-profile">
                                            <span>
                                                <i class="fa-regular fa-image"></i>
                                            </span>
                                            <p class="upload-text">Upload Profile</p>
                                            <button class="btn-custom btn-gray-custom">
                                                choose
                                            </button>
                                        </label>
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <button type="button" class="custom-out-btn btn-form">
                                            save
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div> -->
                        @livewire('parent.parent-profile')
                    </div>
                    <div class="col-md-4 col-12 mb-s-0 mb-3">
                        <div class="from-container">
                            <div class="contact-form black-contact-form">
                                <form >
                                    <div class="input-item me-auto ms-0">
                                        <input type="text" name="name" placeholder="name" value="hussien mohamed">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    

                                    <div class="input-item me-auto ms-0">
                                        <select placeholder="MM">
                                            <option disabled aria-hidden="true">MM</option>
                                            <option selected name="January" value="January">Jan</option>
                                            <option name="February" value="February">Feb</option>
                                            <option name="March" value="March">Mar</option>
                                            <option name="April" value="April">Apr</option>
                                            <option name="May" value="May">May</option>
                                            <option name="June" value="June">Jun</option>
                                            <option name="July" value="July">Jul</option>
                                            <option name="August" value="August">Aug</option>
                                            <option name="September" value="September">Sep</option>
                                            <option name="October" value="October">Oct</option>
                                            <option name="November" value="November">Nov</option>
                                            <option name="December" value="December">Dec</option>
                                        </select>

                                        <span>
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <input type="text" name="age" placeholder="age" value="8 years">
                                        <span>
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto m-0">
                                        <input type="text" name="educationalStage" placeholder="educationalStage" value="Primary">
                                        <span>
                                            <i class="fa-solid fa-book"></i>
                                        </span>
                                        <span class="second">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                    </div>
                                    <div class="input-item me-auto ms-0 mt-32">
                                        <input type="file" name="profile" id="parent-profile">

                                        <label class="file-input" for="parent-profile">
                                            <span>
                                                <i class="fa-regular fa-image"></i>
                                            </span>
                                            <p class="upload-text">Upload Profile</p>
                                            <button class="btn-custom btn-gray-custom">
                                                choose
                                            </button>
                                        </label>
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <button type="button" class="custom-out-btn btn-form">
                                            save
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-s-0 mb-3">
                        <div class="from-container">
                            <div class="kids-container">
                                <div class="kid">
                                    <div class="kid-icon icon-animate">
                                        <img src="assets/images/charcters/shankal.png" alt="shankal">
                                    </div>
                                    <div class="kid-data">
                                        <p class="kid-name">Mohamed</p>
                                        <p class="kid-status"><a href="#"><i class="fa-regular fa-trash-can"></i></a></p>
                                    </div>
                                </div>
                                <div class="kid">
                                    <div class="kid-icon icon-animate">
                                        <img src="assets/images/charcters/shankola.png" alt="shankal">
                                    </div>
                                    <div class="kid-data">
                                        <p class="kid-name">Nora</p>
                                        <p class="kid-status"><a href="#"><i class="fa-regular fa-trash-can"></i></a></p>
                                    </div>
                                </div>
                                <div class="kid add-kid">
                                    <a href="#"><div class="kid-icon ">
                                        <img src="assets/images/charcters/plus.png" alt="add kids">
                                    </div></a>
                                    <div class="kid-data">
                                        <p class="kid-name">Add a Child</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
    @livewireScripts
@endsection