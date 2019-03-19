<?php
//Require or call the app filed that is the caller of all pages.
//Also call the base libraries of the controller,models and views
require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';
require_once 'libs/app.php';

//Call by POO the class App
$app = new App();

?>