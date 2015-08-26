<?php
include_once "model/task_model.php";
include_once "view/task_view.php";
class TaskController
{
    private $model;
	  private $view;

    public function __construct() {
        $this->model = new TaskModel();
		    $this->view = new TaskView();
    }

    public function home(){
      $tasks = $this->model->getTasks();
      $this->view->showPage($tasks);
    }

    public function addTask(){
      if (array_key_exists('task', $_REQUEST) && $_REQUEST['task'] != null){
        $this->model->addTask($_REQUEST['task']);
      }
      $this->home();
    }

    public function deleteTask(){
      if (array_key_exists('task', $_REQUEST) && $_REQUEST['task'] != null){
        $this->model->deleteTask($_REQUEST['task']);
      }
      $this->home();
    }
}
?>
