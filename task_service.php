<?php
  class TaskService {
    private $connection;
    
    public function __construct() {
      $this->connection = new Connection();
    }

    public function add($task) {
      $sql = '
        INSERT INTO tb_task(id_user, task, description)
        VALUES (?, ?, ?)
      ';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(1, $task->__get('id_user'));
      $stmt->bindValue(2, $task->__get('task'));
      $stmt->bindValue(3, $task->__get('description'));
      return $stmt->execute();
    }

    public function list($task) {
      $sql = 'SELECT * FROM tb_task WHERE id_user = :id_user AND done = 0';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':id_user', $task->__get('id_user'));
      $stmt->execute();
      $toDoTasks = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach($toDoTasks as $task) {
        $task = $this->preventHTMLInjection($task);
      }
      return $toDoTasks;
    }

    public function listAll($task) {
      $sql = 'SELECT * FROM tb_task WHERE id_user = :id_user';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':id_user', $task->__get('id_user'));
      $stmt->execute();
      
      $allTasks = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach($allTasks as $task) {
        $task = $this->preventHTMLInjection($task);
      }
      return $allTasks;
    }

    public function markAsDone($task) {
      if($task->id && $task->id_user){
        $sql = 'UPDATE tb_task SET done = 1 WHERE id = :id AND id_user = :id_user;';
        $pdo = $this->connection->connect();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $task->__get('id'));
        $stmt->bindValue(':id_user', $task->__get('id_user'));
        
        if($stmt->execute()) {
          return $stmt->rowCount();
        }
      }
      return false;
    }

    public function deleteTask($task) {
      if($task->id && $task->id_user) {
        $sql = 'DELETE FROM tb_task WHERE id = :id AND id_user = :id_user';
        $pdo = $this->connection->connect();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $task->__get('id'));
        $stmt->bindValue(':id_user', $task->__get('id_user'));
        if($stmt->execute()) {
          return $stmt->rowCount();
        }
      }
      return false;
    }

    public function updateTask($task) {
      if($task->task && $task->id_user && $task->id) {
        $sql = '
          UPDATE tb_task SET task = ?, description = ?
          WHERE id_user = ? AND id = ?
        ';
        $pdo = $this->connection->connect();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $task->__get('task'));
        $stmt->bindValue(2, $task->__get('description'));
        $stmt->bindValue(3, $task->__get('id_user'));
        $stmt->bindValue(4, $task->__get('id'));
        
        return $stmt->execute();
      }
      return false;
    }

    public function preventHTMLInjection($task) {
      $task->task = str_replace("<", "&lt;", $task->task);
      $task->task = str_replace(">", "&gt;", $task->task);
      $task->description = str_replace("<", "&lt;", $task->description);
      $task->description = str_replace(">", "&gt;", $task->description);

      return $task;
    }
  }
?>