<?php

namespace App\Http\Controllers;

use App\Events\AddToCardEvent;
use App\Http\Requests\CardAddReq;
use App\Http\Requests\RemoveCardReq;
use App\Http\Requests\UpdateCardReq;
use Illuminate\Http\Request;
use Shankl\Factories\AuthUserFactory;
use Shankl\Factories\RepositoryFactory;
use Shankl\Services\CardService;

use function Symfony\Component\String\b;

class CardController extends Controller
{
  private $cardService;
  public function __construct(CardService $cardService)
  {
    $this->cardService = $cardService;
  }


  public function AddToCard(CardAddReq $request)
  {

    $validatedReq = $request->validated();

    $guard = AuthUserFactory::geGuard();
    $AuthUser = AuthUserFactory::getAuthUser();
    $UserRepo =  RepositoryFactory::getUserRebo($guard);

 
   
    try {
      $this->cardService->AddToCard($UserRepo, $AuthUser, $validatedReq['service_id'], $validatedReq['quantity']);
      toastr("added to card", "success");
      return back();
    } catch (\Exception $th) {
      toastr("error happened", "error");
      return back();
    }
  }


  public function Card()
  {
    $guard = AuthUserFactory::geGuard();
    $UserRepo =  RepositoryFactory::getUserRebo($guard);
    $card = $this->cardService->getCardWithServices($UserRepo);
    return view('web.Card.Card')->with(['card' => $card]);
  }


  public function remove(RemoveCardReq $request)
  {

    $validatedReq = $request->validated();
    $guard = AuthUserFactory::geGuard();
    $AuthUser = AuthUserFactory::getAuthUser();
    $UserRepo =  RepositoryFactory::getUserRebo($guard);


    try {
      $this->cardService->RemoveFromCard($UserRepo, $AuthUser, $validatedReq['service_id']);

      toastr("Removed successfully from cart", 'success');

      return back();
    } catch (\Exception $th) {
    
      toastr('error happened', 'error');

      return back();
    }
  }


  public function updatedCard(UpdateCardReq $request){


    $request->validated();
      

    $guard = AuthUserFactory::geGuard();
    $AuthUser = AuthUserFactory::getAuthUser();
    $UserRepo =  RepositoryFactory::getUserRebo($guard);
   $this->cardService->UpdateCard($UserRepo , $AuthUser , $request['quantity'] , $request['service_id']);
   toastr("Card updated successfully", 'success');
   return back();

  }
}
