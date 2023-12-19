<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Traits\HandleUpload;
use Illuminate\Http\Request;
use Shankl\Services\FileService;
use App\Http\Requests\PartnerAddReq;
use App\Http\Requests\PartnerUpdateReq;
use Shankl\Interfaces\PartnerRepoInterface;

class PartnersController extends Controller
{
    private $partnerRepo;
    private $fileService;

    use HandleUpload;
    public function __construct(PartnerRepoInterface $partnerRepo  , FileService $fileService){

      $this->partnerRepo = $partnerRepo;

      $this->fileService = $fileService;
    }
   public function index(){
      
      return view('admin.partners.partners');
    
   }

   public function create(){

    return view('admin.partners.create');
   }

   public function store(PartnerAddReq $request){
      
      $validatedReq = $request->validated();

      $partnerImage = $this->handleUpload($request , $this->fileService , null , 'partners');

      $partner = $this->partnerRepo->create(['image' => $partnerImage]);

      if ($partner) {
         toastr('partner created successfully' , 'success');

         return redirect()->route('admin-partners');
      }

      toastr('error happened ..!!' , 'error');

      return back();
   }

   public function edit($patnerId){

    $Partner = Partner::findOrFail($patnerId);


    return view('admin.partners.update')->with(['Partner' => $Partner]);

   }

   public function update(PartnerUpdateReq $request){

   $validatedReq = $request->validated();

  $partner = Partner::findOrFail($validatedReq['id']);

  $newPartnerImage = $this->handleUpload($request , $this->fileService , $partner , 'partners');

 $action = $this->partnerRepo->update(['image' => $newPartnerImage , 'id' => $validatedReq['id']]);

 if ($action) {
     toastr('partner updated successfully' , 'success');

     return redirect()->route('admin-partners');
 }
  

     toastr('error happened ..!!' , 'error');

     return back();


   }


   public function delete($partnerId){


       

    $this->partnerRepo->delete($partnerId , $this->fileService);
 
    toastr('partner updated successfully' , 'success');

    return back();


   }
}
