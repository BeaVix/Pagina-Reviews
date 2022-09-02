// responsive navbar
function menuResponsive() {
    var nav = document.getElementById("nav");
    if (nav.className === "navbar") {
      nav.className += "responsive";
    } else {
      nav.className = "navbar";
    }
  }

//PopUp forms

const login = document.getElementById("loginForm");
const register = document.getElementById("registerForm");

function openLoginForm() {
    login.style.display = "block";
}

function closeLoginForm() {
    login.style.display = "none";
}

function openRegisterForm() {
    closeLoginForm();
    login.style.display = "block";
}

function closeRegisterForm() {
    login.style.display = "none";
}
