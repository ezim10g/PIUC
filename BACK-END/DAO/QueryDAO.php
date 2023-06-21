<?php


class Query{

    private $table;
    private $columns;
    private $values;
    private $conditions;
    function __construct($table){
        $this->table = $table;
    }
    function Select($table, $columns, $condition){   
        $this->setColumns($columns); 
        $this->setCondition($condition);
        $sql = "SELECT " . $this->columns ."FROM " . $this->table . $this->conditions;
        return $sql;
    }

    private function setColumns($columns){
        for ($i=0; $i < count($columns); $i++) { 
            if((count($columns) - 1) == $i){
                $this->columns .= $columns[$i] . " "; 
            }else{
                $this->columns .= $columns[$i] . ","; 

            }
        }
    }

    private function setCondition($condition){
        $sqlCondition = " WHERE ";
 
        for ($i=0; $i < count($condition); $i++) { 
            $sqlCondition .= $condition[$i] . " = :" . $condition[$i];
            if((count($condition) - 1) != $i){
                $sqlCondition .= " AND ";
            }
        }
        $this->conditions = $sqlCondition;
    }

}