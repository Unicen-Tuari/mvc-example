<?php
include_once 'libs/Smarty.class.php';

class TaskView {
  private $smarty;

  function __construct() {
      $this->smarty = new Smarty;
  }

  public function showPage($tareas){
      $this->smarty->assign("tareas", $tareas);
      $this->smarty->display('index.tpl');
  }
}
?>
