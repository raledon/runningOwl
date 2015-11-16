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
final class DateTransform {
    //put your code here
    public static function createDate($input){
        return DateTime::createFromFormat('Y-n-j', $input);
    }
    
    public static function createDateTime($input){       
        return DateTime::createFromFormat('Y-n-j H:i:s', $input);
    }
    
    
}
