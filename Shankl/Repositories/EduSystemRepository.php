<?php
namespace Shankl\Repositories ;

use App\Models\EduSystem;
use Shankl\Interfaces\EduSystemRepoInterface;

class EduSystemRepository implements EduSystemRepoInterface {
    public function getEduSystems()
    {
       $eduSystem = EduSystem::select('id' , 'name')->get(); 
       return $eduSystem;
    }
}