<?php
  require_once 'user_controller.php';
  if(!$_SESSION['auth'] || !isset($_SESSION['auth'])) {
    header('Location: index.php?error=auth');
  }

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
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/title.css">
  <link rel="stylesheet" href="assets/styles/module/task.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">
  <link rel="stylesheet" href="assets/styles/state/no.css">

  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
</head>
<body class="l-container">
  <main>
    <header class="lead">
      <h1 class="lead-title">
        To do
        <i class="fa-solid fa-clipboard-list"></i>
      </h1>
      <p class="lead-text"><?= $user->username ?>, here is your personal space, so feel free!</p>
      <hr class="lead-hr">
    </header>
    
    <ul class="l-task">
      <li>
        <article class="task">
          <h3 class="task-title">[Title]</h3>
          <p class="task-desc">[Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto mollitia dolores perferendis ea voluptatibus obcaecati]</p>

          <div class="l-end">
            <button class="fa-solid fa-pen-to-square task-control" type="button">
              <div class="is-hidden-sr-except">
                Edit
              </div>
            </button>
  
            <button class="fa-solid fa-circle-check task-control" type="button">
              <div class="is-hidden-sr-except">
                Done
              </div>
            </button>
            
            <button class="fa-solid fa-trash task-control" type="button">
              <div class="is-hidden-sr-except">
                Delete
              </div>
            </button>
          </div>
        </article>
      </li>

      <li>
        <article class="task">
          <h3 class="task-title">[Title]</h3>
          <p class="task-desc">[Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto mollitia dolores perferendis ea voluptatibus obcaecati]</p>

          <div class="l-end">
            <button class="fa-solid fa-pen-to-square task-control" type="button">
              <div class="is-hidden-sr-except">
                Edit
              </div>
            </button>
  
            <button class="fa-solid fa-circle-check task-control" type="button">
              <div class="is-hidden-sr-except">
                Done
              </div>
            </button>
            
            <button class="fa-solid fa-trash task-control" type="button">
              <div class="is-hidden-sr-except">
                Delete
              </div>
            </button>
          </div>
        </article>
      </li>
    </ul>
    <div class="l-center">
      <button class="button" onclick="goAllTasks()">Show all</button>
      <button class="button button-bluepurple" onclick="goNewTask()">New</button>
    </div>
  </main>
</body>
</html>