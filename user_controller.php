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
  } 
?>