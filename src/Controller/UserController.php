<?php
namespace Controller; 
use Core\Controller; 
use Core\Request;
use Model\UserModel; 

class UserController extends Controller {
    
    public function indexAction() {
        session_start();
        $this->render('index'); 
    }
    
    public function loginAction(){
        extract($this->dataInput); 
        if(!empty($_POST)){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $methodUser = new UserModel();
                $result_login = $methodUser->findLogin(["WHERE" => "email = '$email'"]); 
                
                if($result_login != false){
                    $verifpassword = password_verify($password, $result_login->password);
                    if($verifpassword){
                        session_start();
                        $_SESSION['id'] = $result_login->id; 
                        $_SESSION['email'] = $result_login->email;
                        $_SESSION['password'] = $result_login->password;
                    } else {
                        echo 'password inncorrect';
                    }
                } else {
                    echo 'email or password inncorrect'; 
                }
            } else {
                echo 'Invalid email format';
            }
        }
        if(empty($_SESSION['id'])){
            
            $this->render('login'); 
        } else {
            $result = $methodUser->find($_SESSION['id']);
            $this->render('profil', $result); 
        }
    }
    
    public function registerAction(){
        session_start();
        extract($this->dataInput); 
        
        if(!empty($_POST)){
            $this->dataInput['password'] =  password_hash($this->dataInput['password'], PASSWORD_DEFAULT);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $params = $this->dataInput;
                $methodUser = new UserModel($params);
                if(!empty($email) && (!empty($password))){
                    if(!$methodUser->id){
                        $verif = $methodUser->save();
                        echo "Votre compte a été créé." . PHP_EOL; 
                    } 
                }
            } else {
                echo 'Invalid email format'; 
            }
        }
        
        if(isset($_SESSION['id'])){
            $this->render('profil'); 
        } else {
            $this->render('register');
        }
    }
    
    public function readerAction(){
        session_start();
        $methodUser = new UserModel($this->dataInput);
        $users = UserModel::readAll();
        
        if(empty($_SESSION['id'])){
            $this->render('index'); 
        } else {
            $this->render('show', $users); 
        }
    }
    
    public function profilAction() {
        session_start();
        $methodUser = new UserModel();
        UserModel::getTab();
        
        if(!empty($_SESSION['id'])){
            $result = $methodUser->find($_SESSION['id']);
            $this->render('profil', $result); 
        } else {
            $this->render('index'); 
        }
    }
    
    public function deconnectAction(){
        session_start(); 
        if(isset($_SESSION['id'])){
            session_destroy(); 
        }
        $this->render('index');
    }
    
    public function updateProfilAction(){
        session_start(); 
        $methodUser = new UserModel($this->dataInput);
        UserModel::getTab(); 
        extract($this->dataInput);
        if(!empty($_POST)){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $pass = password_hash($password, PASSWORD_DEFAULT); 
                if(!empty($email) && !empty($password)){
                    $result = $methodUser->update($_SESSION['id'], array('email'=> $email, 'password'=> $pass)); 
                    if($result == true){
                        echo "update success !!!";
                    } else {
                        echo "echec update";
                    }
                }
            } else  {
                echo 'Invalid email format';
            }
        }
        $this->render('update');
    }
    
    public function deleteProfilAction(){
        session_start();
        extract($this->dataInput);
        $methodUser = new UserModel();
        UserModel::getTab(); 
        if(!empty($_POST['password'])){
            if(!empty($_SESSION['id'])){

                $result = $methodUser->find($_SESSION['id']);
                $verifpassword = password_verify($password, $result->password);
                if($verifpassword){
                    $methodUser->delete($_SESSION['id']); 
                    session_destroy(); 
                    echo 'account delete';
                } else {
                    echo 'password inncorrect';
                }
            } 
        }
        if(empty($_SESSION['id'])){
            $this->render('index');
        }else{
            $this->render('delete');
        }
    }
}