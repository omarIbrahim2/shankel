<div>
    <div class="modal fade" id="editComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div wire:ignore class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('school.schoolPhotos') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{ trans('comment.editComment') }}</h4>
                    <div class="container">
                        <form method="POST" action="{{route('update-comment')}}" class="form-group">
                            @csrf
                            @error('comment')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <input type="hidden" name="id" id="editcommentId">
                            <label for="editcomment">{{ trans('comment.comment') }}</label>
                            <input type="text" name="comment" class="input-form" id="editcomment">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('comment.cls') }}</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ trans('comment.edit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($Comments as $comment)


    <div class="reviews-item">
        <div class="review-head">
            <h5>{{$comment->commentable->name()}}</h5>
        </div>
        <div class="review-body">
            {{$comment->comment}}



            @if ( Gate::forUser($AuthUser)->allows("delete-comment" , [$comment , $type]))
            <span><button wire:click="deletecomment({{$comment->id}})" class="btn btn-danger">{{ trans('contact.delete') }}</button></span>
            @endif




            @if (Gate::forUser($AuthUser)->allows("update-comment" , [$comment , $type]))
            <span><button wire:click="to({{$comment}})" class="comment btn btn-warning" data-comment="{{$comment->comment}}" data-commentId="{{$comment->id}}" >{{ trans('contact.update') }}</button></span>
            @endif

        </div>
    </div>
    @endforeach

    <form wire:submit.prevent="createComment">
        <div class="add-review">
            <input wire:model.defer="comment" type="text" placeholder="{{ trans('contact.leaveCom') }}">

        </div>
        @error('comment')

        <p class="text-danger">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary">{{ trans('contact.comment') }}</button>
    </form>


    <script>
        document.addEventListener('livewire:load', function() {
        
            window.addEventListener('comment-added', event => {
              $('#editComment').modal('toggle');

                $("#editcomment").val(event.detail.commentInfo)
                $("#editcommentId").val(event.detail.commentId)
            })

         

        })

    </script>



</div>
