<?php
class TaskModel {
  private $tasks;

  function __construct() {
      $this->tasks = array("Task 1","Task 2","Task 3");
  }

  public function getTasks(){
          return $this->tasks;
  }

  public function deleteTask($task){
    $this->tasks = array_diff($this->tasks, array($task));
  }

  public function addTask($task){
      array_push($this->tasks, $task);
  }
}
?>
