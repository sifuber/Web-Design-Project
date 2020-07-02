function openNav() {
  var mainWidth = document.getElementById("main").offsetWidth - 180;

  document.getElementById("sidebar").style.width = "180px";
  document.getElementById("main").style.left = "180px";
  
  var rects = document.getElementById("main").getClientRects();
  var rect = rects[0]['left'];
  if (rect == 0){
    document.getElementById("main").style.width = `${mainWidth}px`;
  }
};

function closeNav() {
  document.getElementById("sidebar").style.width = "0px";
  document.getElementById("main").style.left = "0px";
  document.getElementById("main").style.width = "100%";
  document.getElementById("update").style.display = "none";
};

$("#updateLink").click(function () {
  $("#update").toggle();
});
