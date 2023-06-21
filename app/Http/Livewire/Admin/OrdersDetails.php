<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Shankl\Repositories\ServiceOrderRepo;

class OrdersDetails extends Component
{
    public $transactionId;
    public function render(ServiceOrderRepo $serviceOrderRepo)
    {
        $services = $serviceOrderRepo->transactionService($this->transactionId)->services;
        return view('livewire.admin.orders-details')->with(['services' => $services]);
    }
}
