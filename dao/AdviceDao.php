<?php
require 'BasicDao.php';
require '../model/Advice.php';
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
final class AdviceDao {
    private $db;
    private $tableName;
    
    public function __construct() {
        $this->tableName = 'advice';
    }
    
    public function __destruct() {
        $this->db = null;
    }
    
    public function getDb(){
        if($this->db !== null){
            return $this->db;
        }
        $this->db = BasicDao::getDb();
        return $this->db;
    }
    
    public function insert(Advice $advice){
        $advice->setAdviceId(null);
        $advice->setCreatedAt(new DateTime());
       // echo $advice->getCreatedAt()->format('Y-m-d H:i:s');
        //echo $advice->getCreatedAt();
        $sql = 'insert into ' . $this->tableName . 'values( :content, :createdBy, :createdAt)';
        $statement = $this->getDb()->prepare('$sql');
        $date = array('content'=>$advice->getContent(), 'createdBy'=>$advice->getCreatedBy(), 'createdAt'=>$advice->getCreatedAt());
        $statement->execute($date);
       // echo date_format($advice->getCreatedAt(), 'Y-m-d H:i:s');
        
        
    }
    
    private static function formatDateTime(DateTime $date) {
        return $date->format(DateTime::ISO8601);
    }
}

$adviceDao = new AdviceDao();
$adviceDao->getDb();
$advice = new Advice();
$advice->setContent('what if i want to eat without getting fat while i have been escaping exercising for decades');
$adviceDao->insert($advice);
?>