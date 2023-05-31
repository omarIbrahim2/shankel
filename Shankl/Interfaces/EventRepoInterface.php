<?php

namespace Shankl\Interfaces;

interface EventRepoInterface{

 public function getEvents($pages);
  public function getEventsguest($pages);

 public function addEvent($data);

 public function find($eventId);

 public function updateEvent($data);

 public function subscribeUser($eventId , $User);
 public function cancelSubscribeUser($eventId , $User);

 public function eventSubscribers($eventId);

 public function  getEventsWeb($userId = null , $guard);

}