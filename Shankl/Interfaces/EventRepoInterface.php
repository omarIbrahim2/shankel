<?php

namespace Shankl\Interfaces;

interface EventRepoInterface{

 public function getEvents($pages);

 public function addEvent($data);

 public function find($eventId);

 public function updateEvent($data);

}