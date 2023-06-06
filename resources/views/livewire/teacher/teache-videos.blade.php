<div>

    <div class="modal-body">

        @if ($videos)

            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-md-3">
                        <div class="card" style="">
                            <div class="row">
                                <div class="col-md-3">
                                    <iframe width="100" height="100" src="{{ $video->url }}" title="Lesson" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                    <p class="deletePhoto" wire:click=""><button><i class="fa-solid fa-xmark"></i></button></p>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-danger m-5 text-center ">
                <p>{{ trans('teacher.noVideo') }}</p>
            </div>
        @endif

    </div>


    <div class="modal-footer d-flex justify-content-around">
        <form wire:submit.prevent="save">
            <div class="form-group">
                @error('url')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input class="form-control" placeholder="Add New Lesson" type="text" wire:model.defer="url"
                    id="teacher-lessons">
                <button type="button"
                    wire:click="save"class="btn btn-primary m-2">{{ trans('school.saveChange') }}</button>
            </div>

        </form>
        <div class="upload-avatar mb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('school.cls') }}</button>
        </div>

    </div>
