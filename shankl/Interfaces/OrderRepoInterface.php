<?php

namespace Shankl\Interfaces;


interface OrderRepoInterface{
    public function create($data);
    public function update($data);
    public function getAll($pages);
    public function findById($orderId , $pages);
}