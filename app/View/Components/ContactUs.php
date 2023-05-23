<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Shankl\Services\AdminService;

class ContactUs extends Component
{
    public $adminService;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $Social = $this->adminService->getSocials();
         
        return view('components.contact-us')->with([
            'Social' => $Social,
        ]);
    }
}
