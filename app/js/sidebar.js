function openSideBar() {
  var sidebar = document.getElementById("sidebar");
  sidebar.classList.add("open");
}

function closeSideBar() {
  var sidebar = document.getElementById("sidebar");
  sidebar.classList.remove("open");
}
document.addEventListener("click", function (event) {
  const sidebar = document.getElementById("sidebar");
  if (!sidebar.contains(event.target) && !event.target.matches(".open-btn")) {
    sidebar.classList.remove("open");
  }
});
