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
        //echo $data[':content'];
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
        $sql = $this->getFindSql(array('adviceId'=>'?'));
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
        $result = array();
        $sql = $this->getFindSql(array('order by'=>createdAt));
        foreach ($this->query($sql) as $row){
            $advice = new Advice();
            AdviceMapper::map($advice, $row);
            $result[$advice->getAdviceId()] = $advice;
        }
        return $result;
    }
    
    private function query($sql){
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if($statement === false){
            throw new Exception('fail to create the statement');
        }
        return $statement;
    }
    
    public function find(array $properties){
        $sql = $this->getFindSql($properties);
        $statement = $this->getDb()->query($sql);
        
    }
    
    public function getFindSql(array $properties = null){
        $sql = 'select * from ' . $this->tableName;
        $where = '';
        $groupBy = '';
        $orderBy = '';
        if($properties === null){
            return $sql . ';';
        }
        if(array_key_exists('adviceId', $properties)){
            $where = ' where adviceId = ' . $properties['adviceId'];
        }
        if(array_key_exists('createdAt', $properties)){
            $where = ' where createdAt = ' . $properties['createdAt'];
        }
        if(array_key_exists('createdBy', $properties)){
            $where = ' where createdBy = ' . $properties['createdBy'];
        }
        if(array_key_exists('order by', $properties)){
            $orderBy =' order by ' . $properties['order by'];
        }
        if(array_key_exists('group by', $properties)){
            $groupBy = ' group by ' . $properties['group by'];
        }
        return $sql . $where . $groupBy . $orderBy . ';';
    }
    
}


$adviceDao = new AdviceDao();
$adviceDao->getDb();
$advice = new Advice();
$advice->setContent('what if i want to eat without getting fat while i have been escaping exercising for decades');
$advice->setCreatedBy(1);
$adviceDao->insert($advice);
var_dump($adviceDao->findById('1')->getCreatedBy());
echo $adviceDao->getFindSql();
echo $adviceDao->getFindSql(array('createdAt'=>'2015-10-10'));
?>