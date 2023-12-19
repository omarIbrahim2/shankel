<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Shankl\Factories\AuthUserFactory;

class Notifications extends Component
{

    use WithPagination;
    public function render()
    {
         $AuthUser = AuthUserFactory::getAuthUser();


        $Notifications = $AuthUser->notifications()->orderBy('created_at' , 'DESC')->paginate(10);
        return view('livewire.admin.notifications')->with(['Notifications' => $Notifications]);
    }




    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
