<?php

require_once '../validation/EventValidator.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author john
 */
final class Event {
    private $eventId;
    private $typeId;
    private $description;
    private $createdBy;
    private $createdAt;
    private $location;
    private $scale;
    
    const SCALE_FRIENDS = '1';
    const SCALE_ALLUSERS = '2';
    
    public static function allScales(){
        return array(
            self::SCALE_ALLUSERS,
            self::SCALE_FRIENDS,
        );
    }
    public function setEventId($eventId){
        $this->eventId = $eventId;
    }
    
    public function getEventId(){
        return $this->eventId;
    }
    
    public function setTypeId($typeId){
        $this->typeId = $typeId;
    }
    
    public function getTypeId(){
        return $this->typeId;
    }
    
    public function setDescription($description){
        $this->description = $description;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setCreatedBy($createdBy){
        $this->createdABy = $createdBy;
    }
    
    public function getCreatedBy(){
        return $this->createdBy;
    }
    
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }
    
    public function getCreatedAt(){
        return $this->createdAt;
    }
    
    public function setLocation($location){
        $this->location = $location;
    }
    
    public function getLocation(){
        return $this->location;
    }
    
    public function setScale($scale){
        EventValidator::validateScale($scale);
        $this->scale = $scale;
    }
    
    public function getScale(){
        return $this->scale;
    }
}
