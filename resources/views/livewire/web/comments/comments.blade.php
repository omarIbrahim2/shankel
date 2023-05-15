<div>

    @foreach ($Comments as $comment)
        
    
    <div class="reviews-item">
        <div class="review-head">
            <h5>{{$comment->commentable->name}}</h5>
        </div>
        <div class="review-body">
            {{$comment->comment}}
        </div>
    </div>
    @endforeach
 
    <div class="add-review">
        <input wire:model.defer="commented" type="text" placeholder="leave comment">												
    </div>
    <button wire:click="createComment"  class="btn btn-primary">{{ trans('contact.comment') }}</button>
</div>
