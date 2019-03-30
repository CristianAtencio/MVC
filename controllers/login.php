<?php

class Login extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function index(){

        if (isset($_POST['inputUser']) && isset($_POST['inputPassword'])) {

            $user = $_POST['inputUser'];
            $pass = $_POST['inputPassword'];
            $this->login(['user' => $user, 'pass' => $pass]);
        }else{
            
            session_destroy();
            $this->view->render('login/index');
        }    
    }   

    function login($item){

        $login = $this->model->validateLogin($item);

        if (!empty($login->user)) {
            $_SESSION['name'] = $login->firstName . " " . $login->lastName;
            $_SESSION['user'] = $login->user;
            $_SESSION['role'] = $login->role;
            header('Location: ' . constant('URL') . 'main');
        }else{
            $this->view->mensaje = "User or Password is incorrect.";
            $this->view->render('login/index');
        }
    }
}
?>