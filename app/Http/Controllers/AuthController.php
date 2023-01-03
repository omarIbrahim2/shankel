<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Services\AuthService;
use Shankl\Entities\ParentEntity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use App\Http\Requests\ParentRegisterReq;
use Shankl\Repositories\ParentRepository;

class AuthController extends Controller
{

    private AuthService  $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;

    
    }


    public function Parentregister(ParentRegisterReq $request){
           
        $request->validated();

         
        $parentObj = new ParentEntity($request->all());
        $parentRepo = new ParentRepository();

        $hashPassword = Hash::make($request->password);

        $parentObj->setPassword($hashPassword);

        $parentObj->changeStatus();

        $authParent = $this->authService->RegisterUser($parentRepo , $parentObj);

        Auth::guard('parent')->login( $authParent);
        $request->session()->regenerate();

       // toastr()->error("dkslew");
        $parent_id = $authParent->id;
        return redirect()->route('add-child' , $parent_id);
    }

    public function parentLogin()
    {
        
        return redirect()->route('parent');
    }


    public function parentLogout()
    {
         Auth::guard('parent')->logout();
         return redirect()->route('home');
    }
}
