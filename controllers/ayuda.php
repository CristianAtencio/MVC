<?php

class Ayuda extends Controller{

    function __construct(){
       parent::__construct();
       $this->view->user = "";
    }

    function index(){
        $this->view->user = $_SESSION['name'];
        $this->view->render('ayuda/index');
    }
}
?>