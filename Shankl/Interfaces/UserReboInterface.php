<?php

namespace Shankl\Interfaces;



interface UserReboInterface{


    public function create($data);

    public function find($userId);

    public function update($data);

}