<?php
require('./libs/Smarty.class.php');

class ViewTareas {
  private $smarty;

  function __construct() {
      $this->smarty = new Smarty;
  }

  public function mostrarPagina($tareas){
      $this->smarty->assign("tareas", $tareas);
      $this->smarty->display('index.tpl');
  }
}
?>
