<?php
require '../util/DateTransform.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdviceMapper
 *
 * @author john
 */
class AdviceMapper {
    //put your code here
    public static function getParams(Advice $advice){
        $params = array(
            ':adviceId' => $advice->getAdviceId(),
            ':content' => $advice->getContent(),
            ':createdBy' => $advice->getCreatedBy(),
            ':createdAt' => DateTransform::dateTimeToString($advice->getCreatedAt())
        );
        return $params;
    }
}
