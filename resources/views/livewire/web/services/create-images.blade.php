   <div class="contact-form black-contact-form">
                <form wire:submit.prevent="save">
                     @csrf
                    <input type="hidden" wire:model="service_id"  type="text">
                    @error('service_id')
                        <p>{{ $message }}</p>
                    @enderror
                  
                  
                    <div class="upload-avatar text-start">
                        @if ($image)
                        @foreach ($image as $img)
                        <p>{{$img->getClientOriginalName()}}</p>
                         @endforeach
                        @endif
                        <label for="School-profile-photos" class="btn-custom">{{ trans('teacher.uploadNew') }} </label>
                        <input  wire:model.defer="image" class="form-control py-2" id="School-profile-photos" type="file" multiple>
            
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>            
                
            
                 
            
            
                    <button type="submit" class="btn-custom">{{ trans('service.add') }}</button>
            
            
                </form>
             </div>