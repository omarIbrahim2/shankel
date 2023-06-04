<?php

namespace App\Http\Livewire\Web\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;
use Shankl\Factories\RepositoryFactory;
use Shankl\Services\CardService;

class Services extends Component
{
    use WithPagination;
    public function render(CardService $cardService)
    {
        $card = $cardService->getCardWithServices(RepositoryFactory::getUserRebo(AuthUserFactory::geGuard()));
          
        $cardServices = $card[0]->services;
        
    
        $allServices = Service::with(['supplier'] , function($query){
          
            $query->select('name')->first();
        })->get()->map(function($service) use($cardServices){

              if ($cardServices->contains($service->id)) {
                  
                  $service->setAttribute('added' , true);

                  return $service;
                 
              }
              $service->setAttribute('added' , false);
              return $service;
        });

        
  
        $Services = Service::paginate($allServices , 10);

    
        return view('livewire.web.services.services')->with(['Services' => $Services]);
    }

      
    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}
