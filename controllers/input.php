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

    function registrarAlumno(){
        
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        
        if($this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido]))
        {
            echo "Create Successful";
        }else{
            echo "Create Failed";
        }
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