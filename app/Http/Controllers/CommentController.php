<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentUpdateRequest;
use Shankl\Services\SchoolService;

class CommentController extends Controller
{
     
  private $schoolService ;
  public function __construct( SchoolService $schoolService)
  {
    $this->schoolService = $schoolService;
  }
    
      public function updateComment(CommentUpdateRequest $request){
       
   $validatedReq =  $request->validated();
       
    $action = $this->schoolService->updateComment($validatedReq['comment'] , $validatedReq['id']);
    
    if ($action) {
        toastr(trans('generalMessages.updateMsg') , "success" , "update comment");

        return back();
    }
    
    toastr(trans('error.errorMsg') , "error" , "update comment");
    return back();
  }

}
