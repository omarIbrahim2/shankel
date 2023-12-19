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

    public function create($data) {
        return EduSystem::create($data);
    }

    public function getEduSystem($eduSystemId) {
        return EduSystem::findOrFail($eduSystemId);
    }

    public function update($eduSystemId , $data) {
        $eduSystem = $this->getEduSystem($eduSystemId);
        return $eduSystem->update($data);
    }

    public function delete($eduSystemId){
        $eduSystem = $this->getEduSystem($eduSystemId);
        return $eduSystem->delete();
    }
}