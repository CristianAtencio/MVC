<?php

class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->render('nuevo/index');
    }
}
?>