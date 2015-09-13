<?php
include_once('tarea.php');
try {
    $API = new TareaApi($_REQUEST['request']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}

 ?>
