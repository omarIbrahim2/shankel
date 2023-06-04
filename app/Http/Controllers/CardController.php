<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardAddReq;
use Illuminate\Http\Request;
use Shankl\Factories\AuthUserFactory;
use Shankl\Factories\RepositoryFactory;
use Shankl\Services\CardService;

class CardController extends Controller
{
   private $cardService;
   public function __construct(CardService $cardService)
   {
      $this->cardService = $cardService;
   }
    public function AddToCard(CardAddReq $request){
       
       $validatedReq = $request->validated();
          
        $guard = AuthUserFactory::geGuard();
        $AuthUser = AuthUserFactory::getAuthUser();
       $UserRepo =  RepositoryFactory::getUserRebo($guard);

       

         try {

          $this->cardService->AddToCard($UserRepo , $AuthUser , $validatedReq['service_id']); 
            
            toastr("added to card" , "success");
            return back();
         } catch (\Exception $th) {
            toastr("error happened" , "error");
             return back();
         }
    }


    public function Card(){
         
      $guard = AuthUserFactory::geGuard();

      $UserRepo =  RepositoryFactory::getUserRebo($guard);
       
        $card = $this->cardService->getCardWithServices($UserRepo);

        $services =$card[0]->services;
         
        return view('web.Card.Card')->with(['Services' => $services]);
            
    }


    public function remove($serviceId){
            
      $guard = AuthUserFactory::geGuard();
      $AuthUser = AuthUserFactory::getAuthUser();
     $UserRepo =  RepositoryFactory::getUserRebo($guard);


     try {
         $this->cardService->RemoveFromCard($UserRepo , $AuthUser , $serviceId);

         toastr("Removed successfully from cart" , 'success');

         return back();
     } catch (\Exception $th) {
         dd($th->getMessage());
         toastr('error happened' , 'error');

         return back();
      
     }


    }
}
