<?php
include_once '../controller/imagenes_controller.php';
include_once 'api.CLASS.php';

class ImagenApi extends Api{

  private $controller;

  function __construct($request){
    parent::__construct($request);
	$this->controller = new ImagenesController();
  }

  protected function imagen(){
    if(count($this->args) == 0){
      return array("Resultado" => "Debe indicar una imagen");
    }
    else{
      if(count($this->args) == 1){
        switch($this->method){
          case 'GET':
            return $this->controller->getImagen($this->args[0]);
          case 'POST':
            return $this->controller->agregarImagenes($this->args[0],$_FILES["imagesToUpload"]);
        }
        return "Only accepts GET or POST";
      }else{
        return "INVALID ARGUMENTS";
      }
    }

  }

}
?>
