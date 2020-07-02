function confirmDeletion() {
  event.preventDefault();
  var form = event.target.form;

  Swal.fire({
    title: "Are you sure?",
    text: "Selected users will be deleted.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Confirm",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.value) {
      form.submit();
    }
  });
}

function confirmChange() {
  event.preventDefault();
  var form = event.target.form;

  Swal.fire({
    title: "Are you sure?",
    text: "Selected users rights will be changed.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Confirm",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.value) {
      form.submit();
    }
  });
}

function showResult(str) {
  if (str.length == 0) {
    document.getElementById("livesearch").innerHTML = "";
    document.getElementById("livesearch").style.border = "0px";
    return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("livesearch").innerHTML = this.responseText;
      document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
    }
  };
  xmlhttp.open("GET", "livesearch.php?q=" + str, true);
  xmlhttp.send();
}
