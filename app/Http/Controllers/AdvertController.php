<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Services\FileService;
use Shankl\Services\AdminService;
use Shankl\Interfaces\AddvertRepoInterface;
use App\Http\Requests\AddvertValidationRequest;
use App\Http\Requests\AddvertValidationUpdateReq;
use App\Traits\HandleUpload;

class AdvertController extends Controller
{
    use HandleUpload;
    private $AdminService;
    private $addvertRebo;
    public function __construct(AdminService $AdminService , AddvertRepoInterface $addvertRebo)
    {
        $this->addvertRebo = $addvertRebo;
        $this->AdminService = $AdminService;
    }
    
    public function indexWeb(){
       
        return view("web.addverts.addverts");
    }
    public function index(){
        return view("admin.addverts.addverts");
    }

    public function createAddvertView()
    {
        
         return view("admin.addverts.createAddvert");
    }


    public function updateAddvertView($addvertId){
    
        $addvert = $this->AdminService->getaddvert($addvertId);
        if (! $addvert) {
            
            return redirect()->back();
        }
        
        return view('admin.addverts.updateAddvert')->with(['addvert' => $addvert ]);
    }

    public function storeAddvert(AddvertValidationRequest $request , FileService $fileService){
       
        $validatedData = $request->validated();

        $validatedData['image'] =  $this->handleUpload($request , $fileService , null , 'addverts');

          $addvert =$this->AdminService->addAddvert($validatedData);
 
          if ($addvert) {
             toastr("add Addvertisment created successfully" , "success");
             return redirect()->route("admin-addverts");
          }
 
          toastr("error in creation " , "error" , "Error");
          return redirect()->route("admin-addverts");
 
     }
     public function show($addvertId){

        $Addvert = $this->AdminService->getAddvert($addvertId);

        return view('admin.addverts.addvertDetails')->with(['Addvert' => $Addvert]);
     }

     
    public function updateAddvert( AddvertValidationUpdateReq $request , FileService $fileService){


        $validatedData = $request->validated();
        $addvert = $this->AdminService->getAddvert($request->id);
        $validatedData['image'] = $this->handleUpload($request , $fileService , $addvert , 'addverts');

        
        $action = $this->AdminService->updateAddvert($validatedData);


        if ($action) {
            
            toastr("Addvertisment updated successfully" , "info" , "Addvertisment update");

            return redirect()->route('admin-addverts');
        }

        toastr("something wrong happened" , "error" , "Addvertisment update");
        return redirect()->back();
    }

    public function delete($addvertId){
           
        $action = $this->AdminService->deleteAddvert($addvertId);

        if ($action) {
           toastr('Addvertisment deleted successfully' , 'success' , 'delete Addvertisment');

           return back();
        }

        toastr("errot in deleting Addvertisment" , 'error');


   }

}
