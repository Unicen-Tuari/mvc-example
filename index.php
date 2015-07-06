<?php
include 'model.php';
include 'view.php';
include 'controller.php';

$model = new ModelTareas();
$view = new ViewTareas();
$controller = new ControllerTareas($model, $view);
$controller->run();

?>
