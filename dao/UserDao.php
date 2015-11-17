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
    private $tableName;

    public function __destruct() {
        $this->db = null;
    }
    
    public function __construct(){
        $this->tableName = 'user';
    }
    private function getDb(){
        if($this->db !== null ){
            return $this->db;
        }
        
        $this->db = BasicDao::getDb();
        return $this->db;
    }
    
    public function delete($userId){
        if($this->findById($userId)){
            return 'User with ID "' . $userId . '" does not exist';
        }
        $sql = "delete from $this->tableName where userId = $userId";
        return $this->getDb()->exec($sql);
    }
    
    public function insert(User $user){
        $user->setCreatedAt(new DateTime());
        $sql = 'insert into user(userId, password, name, gender, telephone, email, avatar, slogan, birthday, createdAt, character)'
                . ' values(:userId, :password, :name, :gender, :telephone, :email, :avatar, :slogan, :birthday, :createdAt, :character)';
        return $this->execute($sql, $user);
    } 
    
    public function modify(User $user){
        if($this->findById($user->getUserId())->getUserId() === null){
            return 'user does not exist';
        }
        $sql = 'update user set '
                . 'password = :password,'
                . 'name = :name,'
                . 'gender = :gender,'
                . 'telephone = :telephone,'
                . 'email = :email, '
                . 'avatar = :avatar,'
                . 'slogan = :slogan,'
                . 'birthday = :birtyday '
                . 'where userId = :userId';
        return $this->execute($sql, $user);
        }
    
    public function findById($userId){
        $sql = 'select * from user where userId = '.(int)$userId;
        $row = $this->query($sql)->fetch();
        if(!$row){
            return null;
        }
        $user = new User();
        UserMapper::map($user, $row);
        return $user;  
    }
  
    public function find($type = null)  {
        $result = array();
        foreach ($this->query($this->getFindSql($type)) as $row){
            $user = new User();
            UserMapper::map($user, $row);
            $result[$user->getUserId()] = $user;
        }
        return result;
        
    }
    
    public function getFindSql($type = null){
        $sql = 'select * from user ';
        if(!$type){
            return $sql;
        }
        $sql = $sql.'where character = '.$type;
        return $sql;
    }
    
    private function query($sql){
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if($statement === false){
            throw new Exception('fail to create the statement');
        }
        return $statement;
    }
    
    private function execute($sql, User $user) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement,$user->toArray());
        if(!$user->getUserId()){
            return $this->findById($this->getDb()->lastInsertId());
        }
        if(!$statement->rowCount()){
            throw new Exception('User with ID "' . $user->getUserId() . '" does not exist');
        }
        return $user;
        
    }
    
    private function executeStatement(PDOStatement $statement, array $params){
        if(!$statement->execute($params)){
            throw new Exception('fail to execute the statement');
        }
    }
}

   
    

$userDao = new UserDao();
$userDao->insert(new User());
