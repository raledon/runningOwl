<?php
include '../config/Config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasicDao
 *
 * @author john
 */

final class BasicDao{
  public static function getDb(){
      $config = Config::getConfig('db');
      echo 'in the function Basic Dao'.$config['dsn'];
      try {
          //$this->db = new PDO($config['dsn']);
          $db = new PDO('sqlite:'.$config['dsn']);
          $db->setAttribute(PDO::ATTR_ERRMODE, 
                              PDO::ERRMODE_EXCEPTION);
          //$this->db->exec("CREATE TABLE Dogs (Id INTEGER PRIMARY KEY, Breed TEXT, Name TEXT, Age INTEGER)");  
      } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
      }
      echo 'connection success';
      return $db; 
  }
}
