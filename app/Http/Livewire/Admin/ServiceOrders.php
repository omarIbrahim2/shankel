<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Repositories\ServiceOrderRepo;

class ServiceOrders extends Component
{
    use WithPagination;
    public $searchOrder; 
    public function render(ServiceOrderRepo $serviceOrderRepo)
    { 
        if ($this->searchOrder) {
            $num = (int) $this->searchOrder;
            $Orders = $serviceOrderRepo->findById($num , 10);
           
       }else{

        $Orders = $serviceOrderRepo->getAll(10 , ['id' ,'user_id' , 'user_type' ,'barcode', 'created_at' , 'status' , 'total_price']);
       }
       
        return view('livewire.admin.service-orders')->with(['Orders' => $Orders]);
    }

    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
