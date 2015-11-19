<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventValidator
 *
 * @author john
 */
class EventValidator {
    public static function validateScale($scale){
        if(!self::isValidScale($scale)){
            throw new Exception('Unknown scale: ' . $scale);
        }
    }
    
    private static function isValidScale($scale){
        return in_array($scale, Event::allScales());
    }
    //put your code here
}
