<?php

spl_autoload_register(function($class){
    $file = str_replace('\\', DIRECTORY_SEPARATOR ,$class) . '.php';
    $file_src = 'src'. DIRECTORY_SEPARATOR .str_replace('\\', DIRECTORY_SEPARATOR ,$class). '.php';
    if(file_exists($file)){
        require_once $file;
    } else {
        require_once $file_src; 
    }

});