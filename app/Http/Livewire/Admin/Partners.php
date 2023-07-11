<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use Shankl\Interfaces\PartnerRepoInterface;

class Partners extends Component
{
    public function render(PartnerRepoInterface $partnerRepo)
    {
        $PartnersCollection = $partnerRepo->get(['image' , 'id']);

         $Partners =Partner::paginate($PartnersCollection , 10);
        return view('livewire.admin.partners')->with(['Partners' => $Partners]);
    }
}
