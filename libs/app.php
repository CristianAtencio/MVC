<?php
//Require de pages error for call it where need in the app
require_once 'controllers/errores.php';

class App{

    function __construct(){
        // echo "<p>New App</p>";
        //We bring the url for divide it and know the controllers and actions, for after call it 
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        // var_dump($url);

        if (empty($url[0])) {
            $archivocontroller = 'controllers/main.php';
            require_once $archivocontroller;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->index();
            return false;
        }

        //configuring the patch of file controller
        $archivocontroller = 'controllers/'. $url[0].'.php';

        //validate the exists controller or go to the pages error
        if(file_exists($archivocontroller)){

            require_once $archivocontroller;
            $controller = new $url[0];
            $controller->loadModel($url[0]);


            //Know if theres action for the controller or pass the index action
            if (isset($url[1])) {

                //Validate the exists action or pass to pages not found
                if (method_exists($controller,$url[1])) {

                    //Contains the quantity elements of the array URL (Controller,Methods or Action and Parameters);
                    $nparam = sizeof($url);

                    if ($nparam > 2) {
                        $param = [];
                        for ($i=2; $i < $nparam ; $i++) { 
                            array_push($param,$url[$i]);
                        }

                        $controller->{$url[1]}($param);
                    }else{
                        
                        $controller->{$url[1]}();
                    }

                }else{

                    $controller = new Errores();

                }
            }else{

                $controller->index();

            }
            
        }else{

            $controller = new Errores();
            
        }

    }
}

?>