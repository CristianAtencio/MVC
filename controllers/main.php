<?php
//This is a Mein controller or index
class Main extends Controller{

    function __construct(){
        parent::__construct();
        // echo "<p>New Controller Main</p>";
    }

    function welcome(){
        echo "<p>Welcome to my page</p>";
    }

    function index(){
        $this->view->render('main/index');
        //echo "<p>Hi,Bro</p>";
    }

}

?>