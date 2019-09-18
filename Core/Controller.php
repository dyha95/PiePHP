<?php
namespace Core;
use Core\Request; 

class Controller 
{
    protected static $_render; 
    protected $data; 
    protected $dataInput = []; 
    
    function __construct() {
        
        $this->data = new Request($_REQUEST);
        $this->data->getInput();
        $array = (array) $this->data;
        foreach ($array as $key => $value) {
            foreach ($value as $key => $value) {
                $this->dataInput[$key] = $value; 
            }
        }
    }
    
    function __destruct() {
        echo self::$_render;
    }
    
    protected function render($view, $scope = []) {
        $tab =[];
        if(is_object($scope)){
            $tabobj = (array) $scope; 
            $extract = extract($tabobj);
            
            foreach($scope as $key => $value){
                $tab[$key] = $value;
            }
        } else {
            $extract = extract($scope);
            if(empty($extract)){
                foreach($scope as $key => $value){
                    $tab[$key] = $value;
                }
            }
        }
        
        
        $class = str_replace('\\', '', basename(get_class($this)));
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', $class), $view]) . '.php';
        if (file_exists($f)) {
            ob_start(); 
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View','index']) . '.php');
            self::$_render = ob_get_clean();
        }
    }
}