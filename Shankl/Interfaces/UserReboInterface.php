<?php

namespace Shankl\Interfaces;



interface UserReboInterface{

    public function getActiveUsers($pages);
    public function getUnActiveUsers($pages);
    public function create($data);

    public function find($userId);

   

    public function update($data);



}