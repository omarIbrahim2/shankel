<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Services\AuthService;
use Shankl\Entities\ParentEntity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use App\Http\Requests\ParentRegisterReq;
use Shankl\Adapters\FileServiceAdapter;
use Shankl\Factories\EntitiesFactory;
use Shankl\Repositories\ParentRepository;
use Shankl\Services\FileService;

class AuthController extends Controller
{

    private AuthService  $authService;

    private FileServiceAdapter $fileser;
    public function __construct(AuthService $authService , FileServiceAdapter $fileser)
    {
        $this->authService = $authService;

        $this->fileser = $fileser;

    
    }


    public function Parentregister(ParentRegisterReq $request  , ParentRepository $parentRepo){
           
        $request->validated();

         
        $parentObj =  EntitiesFactory::createEntity($request->except('image') , 'parent');
        
       
        $hashPassword = Hash::make($request->password);

        $parentObj->setPassword($hashPassword);

        $parentObj->changeStatus();

        if ($request->hasFile('image')) {
            
            
            $this->fileser->setFile($request->file('image'));

            $this->fileser->setPath("parents");

            $filePath =  $this->fileser->upload();

            $parentObj->setImage($filePath);
            

        }

        $authParent = $this->authService->RegisterUser($parentRepo , $parentObj);

        Auth::guard('parent')->login( $authParent);
        
        $request->session()->regenerate();

       
        
        return redirect()->route('add-child' , $authParent->id);
    }

    public function parentLogin()
    {
        
        return redirect()->route('parent');
    }


    public function parentLogout()
    {
         $this->authService->logoutUser('parent');
         return redirect()->route('home');
    }
}
