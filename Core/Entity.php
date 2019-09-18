<?php
namespace Core; 
use Core\ORM; 
use Core\Database; 

class Entity
{
   private $arrayTab = [];
   public static $result; 
   
   public function __construct($tabAttribut = []) {
      if (isset($tabAttribut)){
         foreach($tabAttribut as $key => $value) {
            $this->{$key} = $value; 
            $this->arrayTab[$key] = $value; 
         }
      }
   }
   
   public function save() {
      $orm = new ORM(); 
      $result = $orm->create(self::getTab(), $this->arrayTab); 
      if($result != false) {
         $class = get_class();
         self::$result = new $class(array('id' => $result));
      } 
      return self::$result;
   }
   
   public function read($id) {
      $orm = new ORM(); 
      $result = $orm->read(self::getTab(), $id);  
      if($result != false) {
         $class = get_class();
         self::$result = new $class($result);
      } 
      return self::$result;
   }
   
   public function update($id, $fields) {
      $orm = new ORM(); 
      $result = $orm->update(self::getTab(), $id, $fields);
      return $result;
   }
   
   public function delete($id){
      $orm = new ORM(); 
      $result = $orm->delete(self::getTab(), $id); 
      return $result;
   }
   
   public static function getTab() {
      $tab = str_replace('\\', '', basename(get_called_class()));
      $result =  strtolower(str_replace('Model', '', $tab)).'s';
      return $result; 
   }
   
   public static function find($id) {
      $orm = new ORM(); 
      $result = $orm->find(self::getTab(), ["WHERE" => "id = $id"]); 
      if($result != false) {
         $class= get_class();
         foreach($result as $key => $value){
            self::$result = new $class($value);
         }   
      } 
      return self::$result;
   }
   
   public function findLogin($params) {
      $orm = new ORM(); 
      $result = $orm->find(self::getTab(), $params); 
      if($result != false) {
         $class= get_class();
         foreach($result as $key => $value){
            self::$result = new $class($value);
         }   
      } 
      return self::$result;
   }
   
   public static function readAll() {
      $orm = new ORM(); 
      $class = get_class();
      $result = $orm->find(self::getTab()); 
      if($result != false) {
         $func = function($index) use ($class){
            return new $class($index);
         }; 
         return $func($result);
      } 
      
   }
   
}