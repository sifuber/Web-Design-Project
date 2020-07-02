var loginForm = document.getElementById("login");
var registerForm = document.getElementById("register");
var buttons = document.getElementById("button");

function register() {
  loginForm.style.left = "-400px";
  registerForm.style.left = "45px";
  buttons.style.left = "110px";
}

function login() {
  loginForm.style.left = "45px";
  registerForm.style.left = "450px";
  buttons.style.left = "0px";
}