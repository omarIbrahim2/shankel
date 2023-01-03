<?php
namespace Shankl\Interfaces;

interface ChildRepoInterface{

    public function create($data);

    public function getChild($childId);
    
}