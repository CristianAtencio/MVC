<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->users = [];
        
        $this->view->userExist = "";
        $this->view->user = $_SESSION['name'];
    }

    function index(){
        $users = $this->model->getUsers();
        $this->view->users = $users;
        $this->view->render('admin/index');
    }

    function user(){
        $users = $this->model->getUsers();
        $this->view->users = $users;
        $this->view->render('admin/user');
    }

    function create(){
        
        $nombre       = $_POST['nombre'];
        $apellido     = $_POST['apellido'];
        $correo       = $_POST['correo'];
        $departamento = $_POST['departamento'];
        $rol          = $_POST['rol'];
        $usuario      = $_POST['usuario'];
        $clave        = $_POST['clave'];
        $confirmacion = $_POST['confirmacion'];

        if ($this->model->create([
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'correo' => $correo,
                        'departamento' => $departamento,
                        'rol' => $rol,
                        'usuario' => $usuario,
                        'clave' => $clave])) {
            
        }
        
    }

    function validateUser($param = null){
        $usuario = $param[0];

        $existUser = $this->model->GetByUser($usuario);

        if(!empty($existUser)){

            echo "* Este usuario ya Existe *";
        }
    }

    function validateEmail($param = null){
        $correo = $param[0];

        if($this->model->existByEmail($correo)){
            echo "* Este correo ya esta en uso *";
        }
    }

    function detail($param = null){
        $usuario = $param[0];

        $actualUsuario = $this->model->GetByUser($usuario);

        if (!empty($actualUsuario)) {
            $this->view->users = $actualUsuario;
            $_SESSION['alterUser'] = $actualUsuario->user;
            $this->view->render('admin/detail');
            return; 
        }
        header('Location: ' . constant('URL') . 'admin/index');
    }

    function update($param = null){
        $usuarioUrl = $param[0];

        $nombre       = $_POST['nombre'];
        $apellido     = $_POST['apellido'];
        $correo       = $_POST['correo'];
        $departamento = $_POST['departamento'];
        $rol          = $_POST['rol'];
        $usuario      = $_POST['key'];

        $usuarioSession = $_SESSION['alterUser'];

        if (strcmp($usuarioUrl , $usuarioSession) !== 0 || strcmp($usuario , $usuarioSession) !== 0) {
            header('Location: ' . constant('URL') . 'home');
            return;
        }else{
            if ($this->model->update([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'departamento' => $departamento,
                'rol' => $rol,
                'usuario' => $usuario])) {

                header('Location: ' . constant('URL') . 'admin/index');  
            }
        }

    }


}

?>