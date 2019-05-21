<?php
//This is a Mein controller or index
class Home extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->user = "";
        // echo "<p>New Controller Main</p>";
    }

    function welcome(){
        $this->view->mensaje = "<p>Welcome to my page</p>";
        $this->view->render('home/welcome');
    }

    function index(){
        $this->view->user = $_SESSION['name'];
        $this->view->render('home/index');
        //echo "<p>Hi,Bro</p>";
    }

}

?>