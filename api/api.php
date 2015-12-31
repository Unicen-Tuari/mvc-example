<?php
//http://www.lornajane.net/posts/2012/building-a-restful-php-server-routing-the-request

require_once('tarea.php');
require_once('imagen.php');
try {
  // route the request to the right place
  $url_elements = explode('/', rtrim($_REQUEST['request'], '/'));
  if(count($url_elements)>0){
    $api_name = ucfirst($url_elements[0]) . 'Api';
    if (!($api_name == 'Api') && class_exists($api_name)) {
        $api = new $api_name($_REQUEST['request']);
        echo $api->processAPI();
        return;
    }
  }
  echo "No endpoint ".$url_elements[0];
  return;
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}




 ?>
