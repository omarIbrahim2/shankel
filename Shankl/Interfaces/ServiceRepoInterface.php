<?php

namespace Shankl\Interfaces;


interface ServiceRepoInterface{

   public function create($data);

   public function update($data);

   public function delete($serviceId);

   public function find($serviceId);

}