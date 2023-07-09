<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Notification extends Component
{
    public $no;
    public function render()
    {
        $admin = auth()->user();

         $this->no = $admin->notifications;
        return view('livewire.admin.notification');
    }


    public function getListeners(){
          return ['echo:RegisterUser,UserRegisterEvent'=>'increment'];
    }

    public function increment(){

        dd('ok');
    }
}
