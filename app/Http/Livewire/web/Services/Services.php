<?php

namespace App\Http\Livewire\Web\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;
use Shankl\Factories\RepositoryFactory;
use Shankl\Repositories\ServiceRepository;
use Shankl\Services\CardService;

class Services extends Component
{
    use WithPagination;
    public function render(CardService $cardService , ServiceRepository $serviceRepo)
    {
        $userRepo = RepositoryFactory::getUserRebo(AuthUserFactory::geGuard());

        if ($userRepo != null){
            $card = $cardService->getCardWithServices($userRepo);

            $cardServices = $card->services;
            $allServices = $serviceRepo->getServices()->map(function($service) use($cardServices){

                if ($cardServices->contains($service->id)) {
                    
                    $service->setAttribute('added' , true);
            
                    return $service;
                   
                }
                $service->setAttribute('added' , false);
                return $service;
            });
        }else{

            $allServices = $serviceRepo->getServices();

        }
        
        $Services = Service::paginate($allServices , 10);

    
        return view('livewire.web.services.services')->with(['Services' => $Services]);
    }

      
    public function paginationView()
    {
        return 'livewire.web-pagination';
    }
}



