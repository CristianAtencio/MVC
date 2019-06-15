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

    function item($param = null){

        $role   = $_SESSION['role'];
        $idItem = $param[0];

        $item = $this->model->getItem($idItem);
        $this->view->item = $item;

        if (strcmp("",$item->model) == 0) {
            
            $this->view->render('input/item');
        }else{
            $this->view->render('input/revision');
        }

    }

    function revisionItem($param = null){
        $idItem = $param[0];
        $user = $_SESSION['name'];

        $modelo = $_POST['modelo'];
        $potencia = $_POST['potencia'];
        $voltaje = $_POST['voltaje'];
        $serial1 = $_POST['serial1'];
        $serial2 = $_POST['serial2'];
        $causa2 = $_POST['causa2'];
        $piezas = $_POST['piezas'];
        $observacion2 = $_POST['observacion2'];

        if ($this->model->updateRevision([
            'idItem' => $idItem,
            'modelo' => $modelo, 
            'potencia' => $potencia, 
            'voltaje' => $voltaje,
            'serial1' => $serial1,
            'serial2' => $serial2,
            'causa2' => $causa2,
            'piezas' => $piezas,
            'observacion2' => $observacion2,
            'userRevision' => $user])) {

            header('Location: ' . constant('URL') . 'home');  
        }
    }

}
?>