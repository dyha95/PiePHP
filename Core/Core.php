<?php 
namespace Core; 
use Core\Controller; 
use Core\Router; 

class Core {
    
    public function run(){
        require_once 'routes.php';
        
        $url = $_SERVER['REQUEST_URI'];
        $racine = str_replace(BASE_URI, '',$url); 
        $r2 = rtrim($racine, '/');
        $urlCase = explode('/', $racine);
        
        if(empty($urlCase[1])){
            $Router = Router::get($racine);
        } else{
            $Router = Router::get($r2);
        }
        
        if($Router != false){
            foreach ($Router as $key => $value){
                if ($key === "controller"){
                    $Controller = "Controller\\".ucwords($value)."Controller";
                    if(class_exists($Controller)){
                        $control = new $Controller();
                    }  
                } 
                if ($key === "action"){
                    $Action = $value."Action"; 
                    if (method_exists($control, $Action)){
                        $control->$Action();
                    }
                }  
            }
        } 
        // else {
            //     $control = new Controller(); 
            //     $control->PageError404();
            // }
            
            //////// Route Dynamique///////
            // if(empty($urlCase[3]) && empty($urlCase[4])){
                //     $app = new AppController(); 
                //     $app->indexAction(); 
                // } 
                
                // if($urlCase[3] !== "user" || (!empty($urlCase[4]) && $urlCase[4] !==  "add")){
                    //     $Controller = new Controller();
                    //     $Controller-> PageError404();
                    
                    // } elseif ($urlCase[3] === "user"){
                        //     $UserController = "Controller\\".ucwords($urlCase[3])."Controller"; 
                        //     $control = new $UserController();
                        
                        //     if(!empty($urlCase[4]) && $urlCase[4] === "add") {
                            //         $method = $urlCase[4] . 'Action'; 
                            //         $control->$method();
                            //     }
                            
                            // } 
                            
                        }
                    }
                    