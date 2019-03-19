<?php

class View{

    function __construct(){
        // echo "<p>Base view</p>";
    }

    function render($name){
        require 'views/'.$name.'.php';
    }
}
?>