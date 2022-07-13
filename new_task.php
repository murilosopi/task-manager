<?php
  require_once 'user_controller.php';
  if(!$_SESSION['auth'] || !isset($_SESSION['auth'])) {
    header('Location: index.php?error=auth');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New task</title>
  <link rel="stylesheet" href="assets/styles/base/normalize.css">
  <link rel="stylesheet" href="assets/styles/base/colors.css">
  <link rel="stylesheet" href="assets/styles/layout/l-nav.css">
  <link rel="stylesheet" href="assets/styles/layout/l-container.css">
  <link rel="stylesheet" href="assets/styles/layout/l-center.css">
  <link rel="stylesheet" href="assets/styles/layout/l-form.css">
  <link rel="stylesheet" href="assets/styles/layout/l-alert.css">
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/form.css">
  <link rel="stylesheet" href="assets/styles/module/button.css">
  <link rel="stylesheet" href="assets/styles/module/icon.css">
  <link rel="stylesheet" href="assets/styles/module/menu.css">
  <link rel="stylesheet" href="assets/styles/module/alert.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">


  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>
</head>
<body class="l-container">
  <?php if(isset($_GET['error']) && $_GET['error'] === 'task') { ?>

    <div class="l-alert">
      <article class="alert alert-error">
        <p class="alert-text">
          Sorry, something went wrong, try again later...
          <i class="fa-solid fa-face-frown-open icon"></i>
        </p>
      </article>
    </div>

  <?php } ?>

  <?php if(isset($_GET['success']) && $_GET['success'] === 'task') { ?>

    <div class="l-alert">
      <article class="alert alert-success icon">
        <p class="alert-text">
          Your task was registered
          <i class="fa-solid fa-check"></i>
        </p>
      </article>
    </div>

  <?php } ?>

  <header>
    <div class="lead">
      <h1 class="lead-title">
        New task
        <i class="fa-solid fa-plus"></i>
      </h1>
      <p class="lead-text">Describe the task you have to do</p>
      <hr class="lead-hr">
    </div>

    <nav class="l-nav">
        <button class="icon nav-toggler">
          <i class="fa-solid fa-bars-staggered"></i>
          <span class="is-hidden-sr-except">Menu</span>
        </button>
      
        <ul class="menu is-hidden">
          <li class="menu-item">
            <a class="menu-link" href="home.php">
              <i class="fa-solid fa-chart-simple"></i>
              Dashboard
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="home.php">
              <i class="fa-solid fa-user"></i>
              My account
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="user_controller.php?action=log-out">
              <i class="fa-solid fa-right-from-bracket"></i>
              Log-out
            </a>
          </li>
        </ul>
      </nav>
  </header>

  <main>
    <form action="task_controller.php?action=add" method="POST" class="l-form form">

      <div class="form-control">
        <input type="text" name="task" id="task" class="text-input" placeholder="Type the task title">
        <label for="task" class="floating-label">Task</label>
      </div>

      <div class="form-control">
        <textarea name="description" id="description" class="text-input" placeholder="Descreva sua task" rows="10"></textarea>
        <label for="description" class="floating-label">Description</label>
      </div>

      <div class="l-center">
        <button class="button" type="button" onclick="goHome()">Back</button>
        <button class="button button-bluepurple" type="submit">Add</button>
      </div>
    </form>
  </main>
  
  <script src="assets/js/main.js"></script>
</body>
</html>