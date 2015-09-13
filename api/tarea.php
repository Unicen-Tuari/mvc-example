<?php
include_once '../model/tareas_model.php';
include_once 'api.CLASS.php';

class TareaApi extends Api{

  private $model;
  
  function __construct($request){
    parent::__construct($request);
	$this->model = new TareasModel();
  }

  protected function tarea(){
    if($this->method == 'GET'){      
      return $this->model->getTareas();
    }
    else{
      return "Only accepts GET";
    }
  }

}
 ?>
