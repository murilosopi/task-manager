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
  <link rel="stylesheet" href="assets/styles/layout/l-container.css">
  <link rel="stylesheet" href="assets/styles/layout/l-center.css">
  <link rel="stylesheet" href="assets/styles/layout/l-form.css">
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/form.css">
  <link rel="stylesheet" href="assets/styles/module/button.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">


  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>
  <script src="assets/js/main.js"></script>
</head>
<body class="l-container">
  <header class="lead">
    <h1 class="lead-title">
      New task
      <i class="fa-solid fa-plus"></i>
    </h1>
    <p class="lead-text">Describe the task you have to do</p>
    <hr class="lead-hr">
  </header>

  <main>
    <form action="index.html" method="POST" class="l-form form">

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
</body>
</html>