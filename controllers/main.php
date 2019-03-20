<?php
//This is a Mein controller or index
class Main extends Controller{

    function __construct(){
        parent::__construct();
        // echo "<p>New Controller Main</p>";
    }

    function welcome(){
        $this->view->mensaje = "<p>Welcome to my page</p>";
        $this->view->render('main/welcome');
    }

    function index(){
        $this->view->render('main/index');
        //echo "<p>Hi,Bro</p>";
    }

}

?>