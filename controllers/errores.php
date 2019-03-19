<?php
//All pages that not exists in my app will arrive this part
class Errores extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "What up Bro?";
        $this->view->render('errores/index');

    }
}

?>