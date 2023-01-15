<div>
    <div class="from-container">
        <div class="contact-form black-contact-form">
            @if (session()->has("success"))
            <div class="alert alert-success">
                {{session('success')}}
               </div>
            @endif
            <form wire:submit.prevent="save">
                <div class="input-item me-auto ms-0">
                    <input type="text" name="name" placeholder="name" wire:model="attributes.name">
                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span class="second">
                        <i class="fa-solid fa-pen"></i>
                    </span>
                </div>
                <div class="input-item me-auto ms-0">

                    <input type="email" name="email" placeholder="email"
                    wire:model="attributes.email">
                    <span>
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <span class="second">
                        <i class="fa-solid fa-pen"></i>
                    </span>
                </div>
                <div class="input-item me-auto m-0">
                    <input type="tel" name="phone" placeholder="phone" wire:model="attributes.phone">
                    <span>
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <span class="second">
                        <i class="fa-solid fa-pen"></i>
                    </span>
                </div>
                {{-- <div class="input-item me-auto ms-0">
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
                </div> --}}

                <div class="input-item me-auto ms-0">
                    <button type="submit" class="custom-out-btn btn-form" >
                        save
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
