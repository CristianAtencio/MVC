<?php 

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->render('consulta/index');
    }
}
?>