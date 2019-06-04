<?php

class Input extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->user = "";

        $this->view->user = $_SESSION['name'];
    }

    function index(){
        $this->view->render('input/index');
    }


    function ingresarItem(){

        $nCliente = $_POST['ncliente'];
        $nitCliente = $_POST['nitcliente'];
        $correoCliente = $_POST['correocliente'];
        $contactoCliente = $_POST['contactocliente'];
        $telCliente = $_POST['telcliente'];
        $equipo = $_POST['equipo'];
        $causa = $_POST['causa'];
        $argumento = $_POST['argumento'];
        $observacion = $_POST['observacion'];

        if ($this->model->insert([
                        'nCliente' => $nCliente, 
                        'nitCliente' => $nitCliente, 
                        'correoCliente' => $correoCliente, 
                        'contactoCliente' => $contactoCliente,
                        'telCliente' => $telCliente,
                        'equipo' => $equipo,
                        'causa' => $causa,
                        'argumento' => $argumento,
                        'observacion' => $observacion])) {
            
        }
    }
}
?>