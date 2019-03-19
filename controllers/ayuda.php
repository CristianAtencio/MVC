<?php

class Ayuda extends Controller{

    function __construct(){
       parent::__construct();
    }

    function index(){
        $this->view->render('ayuda/index');
    }
}
?>