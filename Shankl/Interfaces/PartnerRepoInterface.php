<?php

namespace Shankl\Interfaces;

interface PartnerRepoInterface{
   
    public function get(...$args);

    public function create($data);

    
    public function update($data);

    public function delete($partnerId , $fileService);


}