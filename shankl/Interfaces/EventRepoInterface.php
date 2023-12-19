<?php

namespace Shankl\Interfaces;

interface EventRepoInterface
{

    public function getEventsAdmin( $guard ,$pages);
    public function getEventsguest($pages);
    public function addEvent($data , $AuthUser);
    public function find($eventId);
    public function updateEvent($data ,$event);
    public function subscribeUser($eventId, $User);
    public function cancelSubscribeUser($eventId, $User);
    public function eventSubscribers($eventId);
    public function  getEventsWeb($userId = null, $guard);
    public function getReservedEvents($AuthUser, $pages);
}