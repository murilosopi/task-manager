<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in - Task</title>
  <link rel="stylesheet" href="assets/styles/base/normalize.css">
  <link rel="stylesheet" href="assets/styles/base/colors.css">
  <link rel="stylesheet" href="assets/styles/layout/l-container.css">
  <link rel="stylesheet" href="assets/styles/layout/l-form.css">
  <link rel="stylesheet" href="assets/styles/module/animation.css">
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/form.css">
  <link rel="stylesheet" href="assets/styles/module/button.css">
  <link rel="stylesheet" href="assets/styles/module/alert.css">
  <link rel="stylesheet" href="assets/styles/module/icon.css">
  <link rel="stylesheet" href="assets/styles/layout/l-center.css">
  <link rel="stylesheet" href="assets/styles/layout/l-alert.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">
  <link rel="stylesheet" href="assets/styles/state/no.css">

  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>
</head>
<body>
  <main class="l-container">

    <!-- Feedback alerts -->
    <?php if(isset($_GET['error']) && $_GET['error'] === 'sign-up') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            There is a problem with your information provided, try again.
            <i class="fa-solid fa-arrow-rotate-left icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['error']) && $_GET['error'] === 'sign-up-email') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            Sorry, another user is associated with this same email.
            <i class="fa-solid fa-at icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['error']) && $_GET['error'] === 'login') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            Something went wrong with your login, try again 
            <i class="fa-solid fa-id-card icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['error']) && $_GET['error'] === 'auth') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            Please, authenticate your access.
            <i class="fa-solid fa-lock icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success'] === 'sign-up') { ?>

      <div class="l-alert">
        <article class="alert alert-success shake">
          <p class="alert-text">
            Your account was created
            <i class="fa-solid fa-face-laugh-beam icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success'] === 'log-out') { ?>

      <div class="l-alert">
        <article class="alert alert-success shake">
          <p class="alert-text">
            You have successfully logged out of your account.
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </p>
        </article>
      </div>

    <?php } ?>


    <header class="lead">
      <h1 class="lead-title">
        Sign in
        <i class="fa-solid fa-arrow-right-to-bracket"></i>
      </h1>
      <p class="lead-text">You must log-in your account or create it if you haven't one.</p>
      <hr class="lead-hr">
    </header>

    <?php
      if(isset($_GET['action']) && $_GET['action'] == 'sign-up') {
    ?>
      <!-- Form create account -->
      <form action="user_controller.php?action=sign-up" method="POST" class="l-form form" id="sign-up-form">
        <fieldset class="form-area">
          <legend class="form-legend">
            <i class="fa-solid fa-id-card"></i>
            Personal
          </legend>
          <div class="form-control">
            <input type="text" name="name" id="name" placeholder="Type your name here" class="text-input">
            <label for="name" class="floating-label">Name</label>
          </div>
    
          <div class="form-control">
            <input type="date" name="birthdate" id="birthdate" class="text-input">
            <label for="birthdate" class="floating-label">Date of birth</label>
          </div>
        </fieldset>

        <fieldset class="form-area">
          <legend class="form-legend no-margin">
            <i class="fa-solid fa-restroom"></i>
            Gender and preferred pronoun
          </legend>

          <div class="form-control">
            <label for="gender" class="is-hidden">Gender</label>
            <select name="gender" id="gender" class="text-input no-margin">
              <option>-- Select an option --</option>
              <option value="MA">Male</option>
              <option value="FE">Female</option>
              <option value="NB">Non-binary</option>
              <option value="OT">Other</option>
            </select>
          </div>

          <div class="form-control l-center no-padding">
            <div>
              <input type="radio" name="pronoun" id="masc" value="M">
              <label for="masc">Masculine</label>
            </div>
            
            <div>
              <input type="radio" name="pronoun" id="fem" value="F">
              <label for="fem">Feminine</label>
            </div>

            <div>
              <input type="radio" name="pronoun" id="neutral" value="N">
              <label for="neutral">Neutral</label>
            </div>
          </div>
        </fieldset>
        
        <fieldset class="form-area">
          <legend class="form-legend">
            <i class="fa-solid fa-key"></i>
            E-mail and password account
          </legend>
          <div class="form-control">
            <input type="email" name="email" id="email-c" placeholder="name@exemple.com" class="text-input" autocomplete="off">
            <label for="email-c" class="floating-label">Email</label>
          </div>

          <div class="form-control">
            <input type="password" name="passwd" id="passwd-c" placeholder="Type your password" class="text-input" autocomplete="off">
            <label for="passwd-c" class="floating-label">
              Password
            </label>
          </div>
          <div class="form-control no-padding">
            <input type="password" name="confirm-passwd" id="confirm-passwd-c" placeholder="Confirm your password" class="text-input text-input-placeholder" autocomplete="off">
          </div>
        </fieldset>
        <div class="l-center">
          <button type="submit" class="button button-bluepurple">Create account</button>
          <button type="button" class="button" onclick="goLogin()">Back</button>
        </div>
      </form>

    <?php } else { ?>
      <!-- Form login -->
      <form action="user_controller.php?action=log-in" method="POST" class="l-form form">
        <fieldset class="form-area">
          <legend class="form-legend">
            <i class="fa-solid fa-key"></i>
            Access info
          </legend>

          <div class="form-control">
            <input type="email" name="email" id="email-l" placeholder="name@exemple.com" class="text-input" autocomplete="off">
            <label for="email-l" class="floating-label">Email</label>
          </div>
    
          <div class="form-control">
            <input type="password" name="passwd" id="passwd-l" placeholder="type your password" class="text-input" autocomplete="off">
            <label for="passwd-l" class="floating-label">
              Password
            </label>
          </div>
        </fieldset>

        <div class="l-center">
          <button type="button" class="button" onclick="goCreateAccount()">
            Create account
          </button>
          <button type="submit" class="button button-bluepurple">
            Log-in
          </button>
        </div>
      </form>
    <?php } ?>
  </main>

  <script src="assets/js/main.js"></script>
</body>
</html>