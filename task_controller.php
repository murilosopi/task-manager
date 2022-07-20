<?php
  require_once 'user_controller.php';
  require_once "models/task.php";
  require_once "db/connection.php";
  require_once "task_service.php";
  
  $user = $_SESSION['user'];
  $taskService = new TaskService();
  $taskModel = new Task();
  
  $action = isset($_GET['action']) ? $_GET['action'] : $action;
  if($action === 'add') {
    $taskModel
      ->__set('task', $_POST['task'])
      ->__set('description', $_POST['description'])
      ->__set('id_user', $user->id);

    if($taskService->add($taskModel)) {
      header("Location: new_task.php?success=task");
    } else {
      header("Location: new_task.php?error=task");
    }
  }

  if($action === 'list-todo') {
    $taskModel->__set('id_user', $user->id);
    $toDoTasks = $taskService->list($taskModel);
  }

  if($action === 'list-all') {
    $taskModel->__set('id_user', $user->id);
    $allTasks = $taskService->listAll($taskModel);
  }
  
?>