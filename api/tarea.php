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
      if(count($this->args) == 1){
        switch($this->method){
          case 'DELETE': 
            $this->model->borrarTarea($this->args[0]);            
            break;
          case 'PUT':            
            $entity = json_decode($this->body);
            $this->model->actualizarTarea($this->args[0],$entity);
            break;
        }
        return "OK";
      }else{
        return "INVALID ARGUMENTS";
      }
    }
    return "Only accepts GET";
  }

}
 ?>
