<?php

namespace Shankl\Interfaces;



interface UserReboInterface{

    public function getSchools($pages);
    public function create($data);

    public function find($userId);

    public function update($data);

}