<?php
  class TaskService {
    private $connection;
    
    public function __construct() {
      $this->connection = new Connection();
    }

    public function add($task) {
      $sql = '
        INSERT INTO tb_task(id_user, task, task_description)
        VALUES (?, ?, ?)
      ';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(1, $task->__get('id_user'));
      $stmt->bindValue(2, $task->__get('task'));
      $stmt->bindValue(3, $task->__get('description'));
      return $stmt->execute();
    }

  }
?>