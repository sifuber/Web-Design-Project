var count = 0;
var counter = setInterval(timer, 1000);

var check_submit = false;
var idleTime = 0;
var audio = new Audio("images/alarm.mp3");

function timer() {
  count = count + 1;

  var seconds = count % 60;
  var minutes = Math.floor(count / 60);
  var hours = Math.floor(minutes / 60);
  minutes %= 60;
  hours %= 60;
  var adsec = ("0" + seconds).slice(-2);
  var admin = ("0" + minutes).slice(-2);
  var adhr = ("0" + hours).slice(-2);
  document.getElementById("timer").innerHTML =
    " <span class='inner-time'>" +
    adhr +
    " : " +
    admin +
    " : " +
    adsec +
    "</span> ";
}

function isOk() {
  check_submit = true;
  window.location.href = "backend/uploadWork.php";
  console.log(check_submit);
}

window.onbeforeunload = function () {
  if (check_submit == false) {
    return "";
  }
};

$(document).ready(function () {
  var idleInterval = setInterval(timerIncrement, 1000);

  $(this).mousemove(function (e) {
    idleTime = 0;
  });

  $(this).keypress(function (e) {
    idleTime = 0;
  });
});

function timerIncrement() {
  idleTime = idleTime + 1;
  if (idleTime > 10) {
    Swal.fire({
      title: "You are NOT WORKING!",
      text: "Continue work to EARN MONEY.",
      icon: "warning",
      confirmButtonText: "WORK",
    });
    audio.play();
    if (idleTime > 15) {
      var check_submit = true;
      window.location.href = "backend/uploadWork.php";
    }
  }
}
