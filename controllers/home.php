<?php
//This is a Mein controller or index
class Home extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->items = [];
        $this->view->user = "";
        // echo "<p>New Controller Main</p>";
    }

    function welcome(){
        $this->view->mensaje = "<p>Welcome to my page</p>";
        $this->view->render('home/welcome');
    }

    function index(){
        $this->view->user = $_SESSION['name'];
        $items = $this->model->getItems();
        $this->view->items = $items;
        $this->view->render('home/index');
        //echo "<p>Hi,Bro</p>";
    }

}

?>