<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Shankl\Services\AdminService;

class Socials extends Component
{
    public function render(AdminService $adminService)
    {
        $Socials = $adminService->getSocials();
        return view('livewire.admin.socials')->with([
            "Socials" => $Socials,
        ]);
    }
}
