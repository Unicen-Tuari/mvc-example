<?php

include_once "config/config_app.php";
include_once "controller/task_controller.php";

if (!array_key_exists(ConfigApp::$ACTION,$_REQUEST ) || $_REQUEST[ConfigApp::$ACTION] == ConfigApp::$ACTION_HOME){
		$taskController = new TaskController();
		$taskController->home();
}
else {
  if (array_key_exists(ConfigApp::$ACTION,$_REQUEST )){
  		switch ($_REQUEST[ConfigApp::$ACTION]) {
  			case ConfigApp::$ACTION_ADD_TASK:
  				$taskController = new TaskController();
  				$taskController->addTask();
  				break;
        case ConfigApp::$ACTION_DELETE_TASK:
  				$taskController = new TaskController();
  				$taskController->deleteTask();
  				break;
        default:
          echo "Page not found";
  				break;
        }
      }
  }
?>
