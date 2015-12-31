<?php
class ImagenesModel {

  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;dbname=tasks;charset=utf8', 'root', '');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  function getImagen($id){
    $consulta = $this->db->prepare("SELECT path FROM imagen WHERE id = ?");
    $consulta->execute(array($id));
    $imagen = $consulta->fetch(PDO::FETCH_NUM);
    return $imagen[0];
  }

  private function subirImagenes($imagenes){
    $carpeta = "../uploads/imagenes/";
    $destinos_finales = array();
    foreach ($imagenes["tmp_name"] as $key => $value) {
      $destinos_finales[] = $carpeta.uniqid().$imagenes["name"][$key];
      move_uploaded_file($value, end($destinos_finales));
    }

    return $destinos_finales;
  }

  public function agregarImagenes($id_tarea,$imagenes){
    $destinos_finales=$this->subirImagenes($imagenes);

    foreach ($destinos_finales as $key => $value) {
      $consulta = $this->db->prepare('INSERT INTO imagen(fk_id_tarea,path) VALUES(?,?)');
      $ruta = substr($value,3);
      $consulta->execute(array($id_tarea, $ruta));
    }
  }


}
?>
