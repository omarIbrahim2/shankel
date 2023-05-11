<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Repositories\SchoolRegOrdersRepo;

class Orders extends Component
{
    use WithPagination;
    public $searchOrder; 
    public function render(SchoolRegOrdersRepo $order)
    {
        
        if ($this->searchOrder) {
             $num = (int) $this->searchOrder;
             $Orders = $order->findById($num , 10);
            
        }else{

            $Orders = $order->getAll(10); 
        }
         
       

       
        return view('livewire.admin.orders')->with(["Orders" => $Orders]);
    }



    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
