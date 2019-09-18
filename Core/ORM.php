<?php
namespace Core; 
use Core\Database;
use \PDO;

class ORM extends Database {
    
    public function create($table, $fields){
        $tabvalue =[];
        $keys = array_keys($fields); 
        $keysArray = implode(", ", $keys);
        
        $values =  array_values($fields); 
        foreach($values as $value){
            array_push($tabvalue, "'".$value."'"); 
        }
        
        $valuesArray = implode(", ", $tabvalue);
        $query = $this->pdo->prepare("INSERT INTO {$table} ({$keysArray}) VALUES ({$valuesArray})");
        $executeOK = $query->execute();  
        if($executeOK){
            return $this->pdo->lastInsertId();
        } else {
            return false; 
        }
    }
    
    public function read($table, $id){
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = '{$id}' "); 
        $executeOK = $query->execute();
        if($executeOK){
            return $query->fetch();
        } else {
            return false; 
        }
    }
    
    public function update($table, $id, $fields){
        $tabFields = []; 
        foreach($fields as $key => $value) { 
            array_push($tabFields, "{$key} = '{$value}'"); 
        }
        
        $updateCol = implode(", ", $tabFields);
        $sql = "UPDATE {$table} SET {$updateCol} WHERE id = {$id}"; 
        $query = $this->pdo->prepare($sql); 
        $executeOK = $query->execute();
        if($executeOK){
            return true; 
        } else {
            return false; 
        }
    }
    
    public function delete ($table, $id) {
        $query = $this->pdo->prepare("DELETE FROM {$table} WHERE  id = {$id}"); 
        $executeOK = $query->execute();
        if($executeOK){
            return true; 
        } else {
            return false; 
        }
    }
    
    public function find($table, $params = array(
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => ''
        )) {
            $tabParams = []; 
            foreach($params as $key => $value) { 
                if(empty($value)){
                    unset($key); 
                } else {
                    array_push($tabParams, "{$key} {$value}");
                }
            }
            $arrParam = implode(" " ,$tabParams);
            $query = $this->pdo->query("SELECT * FROM {$table} {$arrParam} "); 
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
            
        }    
    }