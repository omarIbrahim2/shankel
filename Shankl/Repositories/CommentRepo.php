<?php
namespace Shankl\Repositories;

use App\Models\Comment;
use App\Models\Parentt;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CommentRepo{


    public function createComment($user , $comment , $schoolId){

     return $user->comments()->create([
       'comment' => $comment,
        'school_id' => $schoolId,
     ]);

    }

    public function getComments($schoolId){

        $comments = Comment::query()
         ->with(['commentable' => function(MorphTo $morphTo){
            $morphTo->morphWith([
               Parentt::class,
               Teacher::class,
               School::class,
            ]);
         }])->where('school_id' , $schoolId)->get();

         return $comments;
    }

    public function deleteComment($commentId){

        $comment = Comment::findOFail($commentId);

        if ($comment) {
          return  $comment->delete();
        }

        return null;
    }

    public function updateComment($newComment , $commentId){
      
      $comment = Comment::findOrFail($commentId);
        
      if ($comment) {
        return  $comment->update([
          'comment' => $newComment,
         ]);
      }


      return null;
 
    }
}