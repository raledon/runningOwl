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

    const FEMALE = 0;
    const MALE = 1;
    
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
            self::ADMIN,
            self::EXERCISER,
            self::DOCTOR,
            self::COACH,
            self::OTHER
        );
    }
    
    public static function allGenders(){
        return array(
            self::FEMALE,
            self::MALE
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
        switch ($this->gender){
            case self::FEMALE:
                return 'female';
            case self::MALE:
                return 'male';
            default:
                break;
        }
        return null;
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
        return $this->character;
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
        switch ($gender){
            case 1:
                $this->gender = self::FEMALE;
                break;
            case 0:
                $this->gender = self::MALE;
                break;
            default:
                $this->gender = null;
                break;
        }
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
    }
        
   

