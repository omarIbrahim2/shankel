<div>

    @foreach ($Comments as $comment)
        
    
    <div class="reviews-item">
        <div class="review-head">
            <h5>{{$comment->commentable->name}}</h5>
        </div>
        <div class="review-body">
            {{$comment->comment}}



            @if ( Gate::forUser($AuthUser)->allows("delete-comment" , [$comment , $type]))
            <span><button wire:click="deletecomment({{$comment->id}})" class="btn btn-danger" >{{ trans('contact.delete') }}</button></span> 
            @endif
             
                  
        
                 
            @if (Gate::forUser($AuthUser)->allows("update-comment" , [$comment , $type]))
            <span><button class="btn btn-warning" >{{ trans('contact.update') }}</button></span>    
            @endif
            
        </div>
    </div>
    @endforeach
 
    <div class="add-review">
        <input wire:model.defer="commented" type="text" placeholder="{{ trans('contact.leaveCom') }}">												
    </div>
    <button wire:click="createComment"  class="btn btn-primary">{{ trans('contact.comment') }}</button>
</div>
