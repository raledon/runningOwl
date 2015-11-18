<?php
require 'BasicDao.php';
require '../model/Advice.php';
require '../mapper/AdviceMapper.php';
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
        $sql = 'insert into '
                . $this->tableName 
                . '(adviceId, content,createdBy,createdAt) '
                . 'values( :adviceId, :content, :createdBy, :createdAt)';
        $statement = $this->getDb()->prepare($sql);
        $data =  AdviceMapper::getParams($advice);
        echo $data[':content'];
        $statement->execute($data);
       // echo date_format($advice->getCreatedAt(), 'Y-m-d H:i:s');
        
        
    }
    
    
    private function execute($sql, Advice $advice){
        $statement = $this->getDb()->prepare($sql);
        $this->execute($sql, AdviceMapper::getParams($advice));
        if(!$advice->getAdviceId()){
            return $this->findById($this->getDb()->lastInsertId());
        }
        if(!$statement->rowCount()){
            
        }
        return $advice;
    }
    
    public function findById($adviceId){
        $sql = "select * from $this->tableName where adviceId = :adviceId";
        $statement = $this->getDb()->prepare($sql);
        $statement->bindParam(':adviceId', $adviceId, PDO::PARAM_INT);
        $statement->execute();            
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        if(!$row){
            return null;
        }
        $advice = new Advice();
        AdviceMapper::map($advice, $row);
        return $advice;
    }

    public function findAll(){
        $sql = $this->getFindSql();
    }
    
    private function getFindSql($property = null){
        $sql = 'select * from ' . $this->tableName;
        $where = ' ';
        $orderBy = 'order by ';
        return $sql;
    }
    
}


$adviceDao = new AdviceDao();
$adviceDao->getDb();
$advice = new Advice();
$advice->setContent('what if i want to eat without getting fat while i have been escaping exercising for decades');
$advice->setCreatedBy(1);
//$adviceDao->insert($advice);
var_dump($adviceDao->findById('1'));
?>