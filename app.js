const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});
function onSuccessfulLogin(username) {
  var navbar = document.getElementById("navbar");

  // Change navbar content after successful login
  navbar.innerHTML = `
  <div class="nav-bar">
  <i class='bx bx-menu sidebarOpen' ></i>
  <img src="img/logo.png" class="logo">

  <div class="menu">
      <div class="logo-toggle">
          <span class="logo"><a href="#">CodingLab</a></span>
          <i class='bx bx-x siderbarClose'></i>
      </div>

      <ul class="nav-links">
          <li><a href="#">Hoe</a></li>
          <li><a href="lessons-html.php">Learn</a></li>
          <li><a href="#">Leaderboard</a></li>
          <li><a href="#">Dashboard</a></li>
          <button class="login-btn">LOG IN</button>
      </ul>
     
  `;
}

function logout() {
  // Implement your logout logic here, e.g., redirect to logout.php
  // window.location.href = "logout.php";
  // For demonstration purposes, let's reload the page
  window.location.reload();
}

// Example usage after successful login
// Replace 'logged-in-username' with the actual username after successful login
onSuccessfulLogin('logged-in-username');