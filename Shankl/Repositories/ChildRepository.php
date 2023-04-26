<?php
namespace Shankl\Repositories;

use App\Models\child;
use Shankl\Interfaces\ChildRepoInterface;

class ChildRepository implements ChildRepoInterface{
    public function create($data)
    {
        return  child::create($data);
    }

    public function getChild($childId)
    {
       return child::findOrFail($childId);
    }

    public function updateChild($childId , $data){
 
        $child = $this->getChild($childId);
          
        
        return $child->update($data);

    }
}