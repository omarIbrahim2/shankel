<?php

namespace Shankl\Interfaces;

interface AddvertRepoInterface{

 public function getAddverts($pages);

 public function addAddvert($data);

 public function find($addvertId);

 public function updateAddvert($data);


 public function  getAddvertsWeb($userId = null , $guard);

 public function deleteAddvert($addvertId);

}