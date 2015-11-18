<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author rale
 */
class Advice{
    private $adviceId;
    private $content;
    private $createdBy;
    /** @var DateTime */
    private $createdAt;
    
    public function setAdviceId($adviceId){
        $this->adviceId = $adviceId;
    }
    
    public function getAdviceId(){
        return $this->adviceId;
    }
    
    public function setContent($content){
        $this->content = $content;
    }
    
    public function getContent(){
        return $this->content;
    }
    
    public function setCreatedBy($createdBy){
        $this->createdBy = $createdBy;
    }
    
    public function getCreatedBy(){
        return $this->createdBy;
    }
    
    public function setCreatedAt(DateTime $createdAt){
        $this->createdAt = $createdAt;
    }
    
    public function getCreatedAt(){
        return $this->createdAt;
    }
 
    public function __toString() {
        return $this->getAdviceId() . ";"
            . $this->getContent() . ";"
            . $this->getCreatedBy() . ";"
            . $this->getCreatedAt();
    }
    
}


?>