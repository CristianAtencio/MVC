<?php

class Controller{

    function __construct(){
        // echo "<p>Base Controller</p>";
        $this->view = new View();
        $this->view->role = $_SESSION['role'];
    }

    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if (file_exists($url)) {
            require $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}

?>