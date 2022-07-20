<?php
  require_once 'user_controller.php';
  if(!$_SESSION['auth'] || !isset($_SESSION['auth'])) {
    header('Location: index.php?error=auth');
  }
  
  $action = 'list-all';
  require_once 'task_controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All tasks</title>
  <link rel="stylesheet" href="assets/styles/base/normalize.css">
  <link rel="stylesheet" href="assets/styles/base/colors.css">
  <link rel="stylesheet" href="assets/styles/module/button.css">
  <link rel="stylesheet" href="assets/styles/layout/l-nav.css">
  <link rel="stylesheet" href="assets/styles/layout/l-container.css">
  <link rel="stylesheet" href="assets/styles/layout/l-center.css">
  <link rel="stylesheet" href="assets/styles/layout/l-end.css">
  <link rel="stylesheet" href="assets/styles/layout/l-task.css">
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/title.css">
  <link rel="stylesheet" href="assets/styles/module/task.css">
  <link rel="stylesheet" href="assets/styles/module/icon.css">
  <link rel="stylesheet" href="assets/styles/module/menu.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">
  <link rel="stylesheet" href="assets/styles/state/no.css">

  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>

</head>
<body class="l-container">
  <header>
    <div class="lead">
      <h1 class="lead-title">
        All tasks
        <i class="fa-solid fa-list"></i>
      </h1>
      <p class="lead-text">Those are all of your tasks</p>
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
    <ul class="l-task">
      <?php foreach($allTasks as $task) { ?>
        <li>
          <article class="task">
            <h2 class="task-title"><?= $task->task ?></h2>

            <?php if($task->done) { ?>
              <h3 class="task-status">
                done
                <i class="fa-solid fa-check-double"></i>
              </h3>
            <?php } else { ?>
              <h3 class="task-status">
              in progress
              <i class="fa-solid fa-spinner"></i>
            </h3>
            <?php } ?>


            <p class="task-desc"><?= $task->task_description ?></p>

            <div class="l-end">
              <button class="fa-solid fa-pen-to-square icon icon-hover" type="button">
                <div class="is-hidden-sr-except">
                  Edit
                </div>
              </button>
    
              <button class="fa-solid fa-circle-check icon icon-hover" type="button">
                <div class="is-hidden-sr-except">
                  Done
                </div>
              </button>
              
              <button class="fa-solid fa-trash icon icon-hover" type="button">
                <div class="is-hidden-sr-except">
                  Delete
                </div>
              </button>
            </div>
          </article>
        </li>
      <?php } ?>
    </ul>
    <div class="l-center">
      <button class="button" onclick="goHome()">Back</button>
      <button class="button button-bluepurple" onclick="goNewTask()">New</button>
    </div>
  </main>
  <script src="assets/js/main.js"></script>
</body>
</html>