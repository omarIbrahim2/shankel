<div>

    <div class="modal-body">
        <form wire:submit.prevent="save">
            <div class="form-group">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input class="form-control" placeholder="Add New Lesson" type="text" wire:model.defer="title"
                    id="teacher-lessons">

                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input class="form-control" placeholder="Add New Lesson" type="text" wire:model.defer="image"
                    id="teacher-lessons">

                @error('url')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input class="form-control" placeholder="Add New Lesson" type="text" wire:model.defer="url"
                    id="teacher-lessons">
                <button type="button"
                    wire:click="save"class="btn btn-primary m-2">{{ trans('school.saveChange') }}</button>
            </div>

        </form>

    </div>


    <div class="modal-footer d-flex justify-content-around">
    
        <div class="upload-avatar mb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('school.cls') }}</button>
        </div>

    </div>
