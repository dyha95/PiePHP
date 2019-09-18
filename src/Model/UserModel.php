<?php

namespace Model;
use Core\Entity; 

class UserModel extends Entity {
    public $id;
    public $email; 
    public $password;
    // public function save($email, $password){
    //     $result = $this->create('users', array("email" => "$email", "password"=> "$password")); 
    //     if($result != false){
    //         return $result; 
    //     } else {
    //         return false; 
    //     }
    // }

    // public function update1($email, $password, $id){
    //     $result = $this->update("users", "id", "$id", array("email"=> "$email", "password" => "$password")); 
    //     if($result == true ){
    //         return true; 
    //     } else {
    //         return false; 
    //     }
    // }
    
    // public function read1($id){
    //     $query = $this->pdo->prepare("SELECT email, password  FROM users WHERE id = :id"); 
    //     $query->bindValue(':id', $id, PDO::PARAM_INT);
    //     $executeOK = $query->execute();
    //     if($executeOK){
    //         return $query->fetch();
    //     } else {
    //         return false; 
    //     }
    // }
    
    // public function read_all(){
    //     $result = $this->find("users"); 
    //     return $result; 
    // }
    
    // public function delete1($id){
    //     $result = $this->delete("users", "id", "$id");
    //     return $result; 
    // }

    // public function checkUser($email, $password){
    //     $result = $this->find('users', array('WHERE' => "email = '{$email}' AND password = '{$password}'"));
    //     if($result != false){
    //         return $result; 
    //     } else {
    //         return false; 
    //     }
    // } 
}