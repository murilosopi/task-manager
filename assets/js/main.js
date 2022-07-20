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

  const signUpForm = document.getElementById("sign-up-form");
  if(signUpForm) {
    signUpForm.addEventListener('submit', submitSignUpHandler);
  }

  const newTaskForm = document.getElementById("new-task-form");
  if(newTaskForm) {
    newTaskForm.addEventListener('submit', submitNewTaskHandler);
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

function submitSignUpHandler(e) {
  e.preventDefault();
  const passwd = document.getElementById("passwd-c");
  const passwdConf = document.getElementById("confirm-passwd-c");
  if(passwd.value === passwdConf.value) {
    this.submit();
  } else {
    generateWarningForm(passwd, "the passwords didn't match");
    generateWarningForm(passwdConf);
  }
}

function submitNewTaskHandler(e) {
  e.preventDefault();
  const task = document.getElementById("task");
  const taskText = task.value.trim();

  if(!taskText) {
    generateWarningForm(task, "you must specify your task!")
  } else {
    this.submit();
  }
}

function generateWarningForm(element, message = "") {
  element.classList.add("is-wrong");
  
  const existsWarning = element.parentNode.querySelector('.input-warning');
  if(!existsWarning && message) {
    const warning = document.createElement('small');
    warning.className = "input-warning";
    warning.textContent = message;
    warning.classList.add("is-wrong");
    element.parentNode.insertAdjacentElement("beforeend", warning);
  }
}