<?php

namespace Shankl\Interfaces;

interface EventRepoInterface{

 public function getEvents();

 public function addEvent($data);

}