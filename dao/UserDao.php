<?php

require 'BasicDao.php';
require '../model/User.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDao
 *
 * @author john
 */
final class UserDao {
    private $db;
    
    public function __destruct() {
        $this->db = null;
    }
    
    private function getDb(){
        if($this->db !== null ){
            return $this->db;
        }
        
        $this->db = BasicDao::getDb();
        return $this->db;
    }
   
    public function insert(User $user){
        $this->db = BasicDao::getDb();
        $user->setCreatedAt(new DateTime());
        $sql = 'insert into user(userId, password, name, gender, telephone, email, avatar, slogan, birthday, createdAt, character)'
                . ' values(:userId, :password, :name, :gender, :telephone, :email, :avatar, :slogan, :birthday, :createdAt, :character)';
        return $this->execute($sql, $user);
    } 
    
     private function execute($sql, User $user) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement,$user->toArray());
    }
    
    private function executeStatement(PDOStatement $statement, array $params){
        if(!$statement->execute($params)){
            throw new Exception('fail to execute the statement');
        }
    }
}

   
    

$userDao = new UserDao();
$userDao->insert(new User());
