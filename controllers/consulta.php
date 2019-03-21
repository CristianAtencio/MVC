<?php 

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->alumnos = [];
        $this->view->mensaje = "";
    }

    function index(){
        $alumnos = $this->model->getAlumnos();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function viewAlumno( $param = null){
        $idAlumno = $param[0];
        
        $alumno =$this->model->getById($idAlumno);
        $this->view->alumno = $alumno;

        session_start();
        $_SESSION['id_viewAlumno'] = $alumno->matricula;
        
        $this->view->render('consulta/detalle');
    }

    function updateAlumno(){
        session_start();
        $matricula = $_SESSION['id_viewAlumno'];

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        unset($_SESSION['id_viewAlumno']);

        if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            
            $this->view->mensaje = "Update Successful";
            $this->index();
        }else{
            $alumno = new Alumno();
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;

            $this->view->alumnos = $alumno;
            $this->view->mensaje = "Update Failed";
            $this->view->render('consulta/detalle');
        }
    }

    function deleteAlumno( $param = null){
        $matricula = $param[0];

        if ($this->model->delete($matricula)) {
        //     $this->view->mensaje = "Delete Successful";
            $mensaje = "Delete Successful";
         }else{
        //     $this->view->mensaje = "Delete Failed";
            $mensaje = "Delete Failed";
         }
        // $this->index();
        echo $mensaje;
    }
}
?>