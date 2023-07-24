<div wire:ignore class="provider-description">
    <h4>
        <span><i class="fa-solid fa-file-pen"></i></span>
        <span>{{ trans('school.' . $attributes['property']) }}</span>
        @error($attributes['property'])
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </h4>
    <textarea id="{{$attributes['id']}}"  class="form-control" wire:model.defer="{{$attributes['property']}}"></textarea>


    <script>


        
      document.addEventListener('livewire:load' , () => {
        ClassicEditor.create(document.querySelector(`#{{$attributes['id']}}`) , {

           language:'ar'
        })
        .then(editor => {
            editor.model.document.on('change:data' , (e)=>{

                @this.set(`{{$attributes['property']}}` , editor.getData())
            })
        })
        .catch(error => {


        })
      })

    </script>
</div>