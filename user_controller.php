<?php
  session_start();
  require_once "user_service.php";

  $userService = new UserService();
  $userModel = new User();
  
  $action = isset($_GET['action']) ? $_GET['action'] : 'none';

  if($action === 'log-in') {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $userModel->__set('email', $email)->__set('passwd', $passwd);
    $user = $userService->login($userModel);

    if($user) {
      $_SESSION['auth'] = true;
      $_SESSION['user'] = $user;
      header('Location: home.php');
    } else {
      header('Location: index.php?error=login');
    }
  } else if($action === 'sign-up') {
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $pronoun = $_POST['pronoun'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $userModel
      ->__set('username', $name)
      ->__set('birthdate', $birthdate)
      ->__set('gender', $gender)
      ->__set('pronoun', $pronoun)
      ->__set('email', $email)
      ->__set('passwd', $passwd);

    $userService->createAccount($userModel);
  }
?>