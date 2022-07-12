function goAllTasks() {
  location.href = "all_tasks.php";
}

function goNewTask() {
  location.href = "new_task.php";
}

function goHome() {
  location.href = "home.php";
}

function goCreateAccount() {
  location.href = "index.php?action=sign-up";
}

function goLogin() {
  location.href = "index.php";
}

(function addEventListeners() {
  const navToggler = document.querySelector("nav .nav-toggler");
  if(navToggler) navToggler.addEventListener('click', navToggleHandler);

  const alert = document.querySelectorAll(".alert");
  if(alert.length > 0) {
    alert.forEach(e => {
      e.addEventListener('click', AlertClickHandler);
    });
  }
})()

function navToggleHandler() {
  const nav = this.parentNode;
  const navMenu = nav.querySelector(".menu");
  if(navMenu.classList.contains("is-hidden")) {
    navMenu.classList.remove("is-hidden");
  } else {
    navMenu.classList.add("is-hidden");
  }
}

function AlertClickHandler() {
  this.classList.add('alert-fadeout');
  setTimeout(() => {
    this.remove();
  }, 400);
}