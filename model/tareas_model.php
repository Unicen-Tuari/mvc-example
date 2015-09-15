<?php
class TareasModel {

  private $tareas;
  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;dbname=tasks;charset=utf8', 'root', '');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  private function subirImagenes($imagenes){
    $carpeta = "uploads/imagenes/";
    $destinos_finales = array();
    foreach ($imagenes["tmp_name"] as $key => $value) {
      $destinos_finales[] = $carpeta.uniqid().$imagenes["name"][$key];
      move_uploaded_file($value, end($destinos_finales));
    }

    return $destinos_finales;
  }

  function getTareas(){
    $tareas = array();
    $consulta = $this->db->prepare("SELECT * FROM tarea");
    $consulta->execute();
//Todas las tareas
    while($tarea = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $consultaImagenes = $this->db->prepare("SELECT * FROM imagen where fk_id_tarea=?");
      $consultaImagenes->execute(array($tarea['id']));
      $imagenes_tarea = $consultaImagenes->fetchAll();
      $tarea['imagenes'] = $imagenes_tarea;
      $tareas[]=$tarea;
    }

    return $tareas;
  }

  function agregarTarea($tarea, $imagenes){

try{

  $destinos_finales=$this->subirImagenes($imagenes);
//Inserto la tarea
    $this->db->beginTransaction();
    $consulta = $this->db->prepare('INSERT INTO tarea(tarea) VALUES(?)');
    $consulta->execute(array($tarea));
    $id_tarea = $this->db->lastInsertId();
//Insertar las imagenes
    foreach ($destinos_finales as $key => $value) {
      $consulta = $this->db->prepare('INSERT INTO imagen(fk_id_tarea,path) VALUES(?,?)');
      $consulta->execute(array($id_tarea, $value));
    }
    $this->db->commit();
  }
  catch(Exception $e){

    $this->db->rollBack();
  }
  }

  function borrarTarea($id_tarea){
    $consulta = $this->db->prepare('DELETE FROM tarea WHERE id=?');
    $consulta->execute(array($id_tarea));
  }

  function realizarTarea($id_tarea){
    $consulta = $this->db->prepare('UPDATE tarea SET realizada=1 WHERE id=?');
    $consulta->execute(array($id_tarea));
  }

  function actualizarTarea($id_tarea, $entity){
    $consulta = $this->db->prepare('UPDATE tarea SET tarea=:tarea, realizada=:realizada WHERE id=:id');
    $consulta->execute(array(
      "tarea" => $entity->tarea,
      "realizada" => $entity->realizada,
      "id" => $id_tarea
      )
    );
  }

  private function subirImagenesAjax($imagenes){
    $carpeta = "uploads/imagenes/";
    $destinos_finales = array();
    foreach ($imagenes as $imagen) {
      $destino =  $carpeta.uniqid().$imagen["name"];
      move_uploaded_file($imagen["tmp_name"], $destino);
      $destinos_finales[] = $destino;
    }
    return $destinos_finales;
  }


  function agregarImagenes($id_tarea, $imagenes){
    $rutas=$this->subirImagenesAjax($imagenes);
    $consulta = $this->db->prepare('INSERT INTO imagen(fk_id_tarea,path) VALUES(?,?)');
    foreach($rutas as $ruta){
      $consulta->execute(array($id_tarea,$ruta));
    }
  }


}
?>
