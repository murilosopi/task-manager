<?php
  require_once "models/user.php";
  require_once "db/connection.php";
  
  class UserService {
    private $connection;

    public function __construct() {
      $this->connection = new Connection();
    }

    public function login($user) {

      $sql = '
        SELECT *
        FROM tb_user
        WHERE email = :email AND passwd = :passwd
      ';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':email', $user->__get('email'));
      $stmt->bindValue(':passwd', $user->__get('passwd'));
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_OBJ);
      
      return $user;
    }
  }
?>