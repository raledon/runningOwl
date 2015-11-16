<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author john
 */
class User {
    const ADMIN = 0;
    const EXERCISER = 1;
    const DOCTOR = 2;
    const COACH = 3;
    const OTHER = -1;
//public function __construct($userId, $password, $name, $gender, $telephone , $email, $avatar, $slogan, $birthday, $createdAt, $character) {
//    $this->setUserId($userId);
//    $this->setPassword($password);
//
//}
    private $userId;
    private $password;
    private $name;
    private $gender;
    private $telephone;
    private $email;
    private $avatar;
    private $slogan;
    private $birthday;
    private $createdAt;
    private $character;
    
    public static function allCharacters(){
        return array(
        self::EXERCISER,
        self::DOCTOR,
        self::COACH
        );
    }
    public function getUserId() {
        return $this->userId;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getSlogan() {
        return $this->slogan;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getCharacter(){
        switch($this->character){
            case self::ADMIN:
                return 'administrator';
            case self::EXERCISER:
                return 'common user';
            case self::DOCTOR:
                return 'doctor';
            case self::COACH:
                return 'coach';
            case self::OTHER:
                return 'other';
            default :
                break;        
        }
        return null;
    }
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function setSlogan($slogan) {
        $this->slogan = $slogan;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setCreatedAt($createdAt) {
        if(get_class($createdAt) !== DateTime){}
        $this->createdAt = $createdAt;
    }

    public function setCharacter($character) {
        switch($character){
            case 0 :
            case 'administrator':
                $this->character = self::ADMIN;
                break;
            case 1:
            case 'common user':
                $this->character = self::EXERCISER;
                break;
            case 2:
            case 'doctor':
                $this->character = self::DOCTOR;
                break;
            case 3:
            case 'coach':
                $this->character = self::COACH;
                break;
            default :
                $this->character = self::OTHER;
                break;
        }
    }

    public function toArray(){
        $params = array(
            ':userId' => $this->getId(),
            ':password' => $this->getPassword(),
            ':name' => $this->getName(),
            ':gender' => $this->getGender(),
            ':telephone' => $this->getTelephone(),
            ':email' => $this->getEmail(),
            ':avatar' => $this->getAvatar(),
            ':slogan' => $this->getSlogan(),
            ':birthday' => $this->getBirthday(),
            ':createdAt' => $this->getCreatedAt(),
            ':character' => $this->getCharacter()
        );
    }
        
   
}
