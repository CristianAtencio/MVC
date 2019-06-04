<?php

class Role extends Controller{

    function __construct(){
        parent::__construct();

    }


    function role(){
        
         echo json_encode($_SESSION['role']);
    }
}
?>