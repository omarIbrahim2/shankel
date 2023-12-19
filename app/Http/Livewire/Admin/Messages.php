<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;
    public function render()
    {
        $Messages = Message::select('id' , 'name' , 'email' , 'subject')->orderBy('created_at' , 'desc')->paginate(10);
        return view('livewire.admin.messages')->with([
            'Messages' => $Messages,
        ]);
    }


    public function paginationView()
    {
        return 'livewire.admin-pagination';
    }
}
