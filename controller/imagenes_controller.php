<?php

include_once '../model/imagenes_model.php';

class ImagenesController {

  private $model;

  function __construct() {
    $this->model = new ImagenesModel();
  }

  function getImagen($id){
    if(isset($id)){
      $image = $this->model->getImagen($id);
      $file = '../'.$image;
      if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="archivo.jpg"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
      }
      else{
        return array("Result" => "Image not found");
      }
    }
  }

  function agregarImagenes($id_tarea, $imagenes){
    if(isset($id_tarea) && isset($imagenes)){
      $this->model->agregarImagenes($id_tarea, $imagenes);
      return array( "Result" => "OK");
    }
  }

}

?>
