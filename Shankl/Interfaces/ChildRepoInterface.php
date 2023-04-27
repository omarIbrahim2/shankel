<?php
namespace Shankl\Interfaces;

interface ChildRepoInterface{

    public function create($data);

    public function getChild($childId);

    public function updateChild($childId , $data);

    public function delete($childId);
    
}