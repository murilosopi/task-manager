<?php
  require_once 'user_controller.php';

  $action = 'list-todo';
  require_once 'task_controller.php';
  $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="assets/styles/base/normalize.css">
  <link rel="stylesheet" href="assets/styles/base/colors.css">
  <link rel="stylesheet" href="assets/styles/module/button.css">
  <link rel="stylesheet" href="assets/styles/layout/l-container.css">
  <link rel="stylesheet" href="assets/styles/layout/l-center.css">
  <link rel="stylesheet" href="assets/styles/layout/l-end.css">
  <link rel="stylesheet" href="assets/styles/layout/l-task.css">
  <link rel="stylesheet" href="assets/styles/layout/l-nav.css">
  <link rel="stylesheet" href="assets/styles/layout/l-alert.css">
  <link rel="stylesheet" href="assets/styles/layout/l-form.css">
  <link rel="stylesheet" href="assets/styles/layout/l-modal.css">
  <link rel="stylesheet" href="assets/styles/module/animation.css">
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/title.css">
  <link rel="stylesheet" href="assets/styles/module/task.css">
  <link rel="stylesheet" href="assets/styles/module/icon.css">
  <link rel="stylesheet" href="assets/styles/module/menu.css">
  <link rel="stylesheet" href="assets/styles/module/alert.css">
  <link rel="stylesheet" href="assets/styles/module/modal.css">
  <link rel="stylesheet" href="assets/styles/module/form.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">
  <link rel="stylesheet" href="assets/styles/state/no.css">

  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>
</head>
<body class="l-container">
  <main>

    <!-- Feedback alerts -->
    <?php if(isset($_GET['success']) && $_GET['success'] === 'done') { ?>

      <div class="l-alert">
        <article class="alert alert-success shake">
          <p class="alert-text">
            Congratulations, you just carried out one of your tasks!
            <i class="fa-solid fa-fire"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success'] === 'delete') { ?>

      <div class="l-alert">
        <article class="alert alert-success shake">
          <p class="alert-text">
            Your task was deleted successfully!
            <i class="fa-solid fa-delete-left icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success'] === 'update') { ?>

      <div class="l-alert">
        <article class="alert alert-success shake">
          <p class="alert-text">
            Your task was updated successfully!
            <i class="fa-solid fa-pencil icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['error']) && $_GET['error'] === 'generic') { ?>

      <div class="l-alert">
        <article class="alert alert-error shake">
          <p class="alert-text">
            Sorry, something went wrong, try again later...
            <i class="fa-solid fa-face-frown-open icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>


    <header>
      <div class="lead">
        <h1 class="lead-title">
          To do
          <i class="fa-solid fa-clipboard-list"></i>
        </h1>
        <p class="lead-text"><?= $user->username ?>, here is your personal space, so feel free!</p>
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
    
    <ul class="l-task">
      <?php foreach($toDoTasks as $task) { ?>
        <li id="task-<?= $task->id?>">
          <article class="task">
            <h3 class="task-title"><?= $task->task ?></h3>
            <?php if ($task->task_description) { ?>
              <p class="task-desc">
                <?= str_replace("\n", '<br>', $task->task_description) ?>
              </p>
            <?php } ?>

            <div class="l-end">
              <button class="fa-solid fa-pen-to-square icon icon-hover" type="button" onclick="showModalUpdate(<?= $task->id?>)">
                <div class="is-hidden-sr-except">
                  Edit
                </div>
              </button>
    
              <button class="fa-solid fa-circle-check icon icon-hover" type="button" onclick="markAsDone(<?= $task->id ?>, 'home')">
                <div class="is-hidden-sr-except">
                  Done
                </div>
              </button>
              
              <button class="fa-solid fa-trash icon icon-hover" type="button" onclick="deleteTask(<?= $task->id ?>, 'home')">
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
      <button class="button" onclick="goAllTasks()">Show all</button>
      <button class="button button-bluepurple" onclick="goNewTask()">New</button>
    </div>

    <div class="l-modal is-hidden modal-background" id="modal-update">
      <div class="modal">
        <div class="modal-inner">
          <header class="modal-header">
            <h3 class="modal-title">
              Change task
              <i class="fa-solid fa-pencil"></i>
            </h3>
          </header>

          <div class="modal-content">
            <form action="task_controller.php?action=update&pag=home.php" method="post" class="l-form form">
              <div class="form-control">
                <input type="text" name="task" id="task" class="text-input" autocomplete="off" placeholder="">
                <label for="task-l" class="floating-label">Task</label>
              </div>
        
              <div class="form-control">
                <textarea name="description" id="description" class="text-input" rows="7"></textarea>
                <label for="description-l" class="floating-label">
                  Description <small>(optional)</small>
                </label>
              </div>
              <input type="hidden" name="id" id="id">

              <div class="l-center">
                <button class="button" onclick="hideModalUpdate()" type="button">Cancel</button>
                <button class="button button-bluepurple" type="submit">Ok</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="assets/js/main.js"></script>
</body>
</html>