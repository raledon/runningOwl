<?php

require '../model/User.php';
require '../util/User.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

final class UserMapper{
    
   public static function map(User $user, array $properties){
       if(array_key_exists('userId', $properties)){
           $user->setUserId($properties['userId']);
       }
       if(array_key_exists('password', $properties)){
           $user->setPassword($properties['password']);
       }
       if(array_key_exists('name', $properties)){
           $user->setName($properties['name']);
       }
       if(array_key_exists('gender', $properties)){
           $user->setGender($properties['gender']);
       }
       if(array_key_exists('telephone', $properties)){
           $user->setTelephone($properties['telephone']);
       }
       if(array_key_exists('email', $properties)){
           $user->setEmail($properties['email']);
       }
       if(array_key_exists('avatar', $properties)){
           $user->setAvatar($properties['avatar']);
       }
       if(array_key_exists('slogan', $properties)){
           $user->setSlogan($properties['slogan']);
       }
       if(array_key_exists('birthday', $properties)){
           $user->setBirthday($properties['birthday']);
       }
       if(array_key_exists('createdAt',$properties)){
           $tempCreatedAt = DateTransform::createDate($properties['createdAt']);
           if($tempCreatedAt){
               $user->setCreatedAt($tempCreatedAt);
           }
       }
       if(array_key_exists('character', $properties)){
           $user->setCharacter($properties['character']);
       }
   }
   
   public static function toArray(User $user) {
       $params = array(
           ':userId' => $user->getId(),
            ':password' => $user->getPassword(),
            ':name' => $user->getName(),
            ':gender' => $user->getGender(),
            ':telephone' => $user->getTelephone(),
            ':email' => $user->getEmail(),
            ':avatar' => $user->getAvatar(),
            ':slogan' => $user->getSlogan(),
            ':birthday' => $user->getBirthday(),
            ':createdAt' => $user->getCreatedAt(),
            ':character' => $user->getCharacter()
       );
       return $params;
   }
    
}
