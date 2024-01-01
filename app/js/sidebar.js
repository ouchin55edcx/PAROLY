let rotation = 0;

function toggleSideBar() {
  var sidebar = document.getElementById("sidebar");
  var btn = document.getElementById("sidebarBtn");
  var parentDiv = btn.parentElement;
  rotation = (rotation + 180) % 360;
  btn.style.transform = `rotate(${rotation}deg)`;
  sidebar.classList.toggle("open");
  parentDiv.classList.toggle("open");
}

document.addEventListener("click", function (event) {
  const sidebar = document.getElementById("sidebar");
  if (!sidebar.contains(event.target) && !event.target.matches(".open-btn")) {
    sidebar.classList.remove("open");
  }
});
