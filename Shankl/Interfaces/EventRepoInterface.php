<?php

namespace Shankl\Interfaces;

interface EventRepoInterface{

 public function getEvents();

 public function addEvent($data);

 public function find($eventId);

 public function updateEvent($data);

}