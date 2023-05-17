<?php
namespace Shankl\Repositories;

use App\Models\comment;
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

        $comments = comment::query()
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

        $comment = comment::findOFail($commentId);

        if ($comment) {
          return  $comment->delete();
        }

        return null;
    }
}