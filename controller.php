<?php
class ControllerTareas
{
    private $model;
	  private $view;

    public function __construct($model, $view) {
        $this->model = $model;
		    $this->view = $view;
    }

    public function run(){
      $tareas = $this->model->getTareas();
      $this->view->mostrarPagina($tareas);
    }

}
?>
