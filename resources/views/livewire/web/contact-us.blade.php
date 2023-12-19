<div>
    <div class="contact-form ">
        @if (session()->has('success'))
             <p class="text-success">{{ session('success') }}</p>
        @endif

        @if (session()->has('error'))
             <p class="text-danger">{{ session('error') }}</p>
        @endif
        <form wire:submit.prevent="save">
            <div class="input-item">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" wire:model="name" placeholder="{{ trans('contact.name') }}">
                <span>
                    <i class="fa-solid fa-user"></i>
                </span>
            
            </div>

            <div class="input-item">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="email" wire:model="email" placeholder="{{ trans('contact.email') }}">
                <span>
                    <i class="fa-regular fa-envelope"></i>
                </span>
                
            </div>
            <div class="input-item">
                @error('subject')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" wire:model="subject" placeholder="{{ trans('contact.sub') }}">
                <span>
                    <i class="fa-solid fa-book"></i>
                </span>

            </div>
            <div class="input-item">
                @error('message')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" wire:model="message" placeholder="{{ trans('contact.mess') }}">
                <span>
                    <i class="fa-regular fa-pen-to-square"></i>
                </span>
            </div>
            <div class="input-item">
                <button type="submit" class="btn-custom">
                    {{ trans('contact.send') }}
                </button>
            </div>
        </form>
    </div>
</div>
