<?php

namespace Controller; 
use Core\Controller; 


class AppController extends Controller{

    public function indexAction(){
        session_start();
        $this->render('index');
    }


}