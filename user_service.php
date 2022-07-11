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

    public function createAccount($user) {

      $sql = '
        INSERT INTO 
          tb_user(username, birthdate, gender, pronouns, email, passwd)
        VALUES
          (?, ?, ?, ?, ?, ?)
      ';
      $pdo = $this->connection->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(1, $user->__get('username'));
      $stmt->bindValue(2, $user->__get('birthdate'));
      $stmt->bindValue(3, $user->__get('gender'));
      $stmt->bindValue(4, $user->__get('pronoun'));
      $stmt->bindValue(5, $user->__get('email'));
      $stmt->bindValue(6, $user->__get('passwd'));
      if($stmt->execute()) {
        header('Location: index.php?success=sign-up');
      } else {
        header('Location: index.php?error=sign-up');
      }
    }
  }
?>