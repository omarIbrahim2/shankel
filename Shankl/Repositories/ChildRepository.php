<?php
namespace Shankl\Repositories;

use App\Models\Child;
use Shankl\Interfaces\ChildRepoInterface;

class ChildRepository implements ChildRepoInterface{
    public function create($data)
    {
        return  Child::create($data);
    }

    public function getChild($childId)
    {
       return Child::findOrFail($childId);
    }

    public function updateChild($childId , $data){
 
        $child = $this->getChild($childId);
          
        
        return $child->update($data);

    }

    public function delete($childId)
    {
        $child = $this->getChild($childId);

        return $child->delete();
    }
}