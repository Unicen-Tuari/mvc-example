<?php
class ModelTareas {
  private $tareas;

  function __construct() {
      $this->tareas = array("Tarea 1","Tarea 2","Tarea 3");
  }

  public function getTareas(){
          return $this->tareas;
  }

  public function borrarTarea($id_tarea){
          //TODO
  }

  public function crearTarea($id_tarea){
          //TODO
  }
}
?>
