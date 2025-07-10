document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.querySelector(".sidebar");
  const sidebarToggler = document.querySelector(".sidebar-toggler");
  const menuToggler = document.querySelector(".menu-toggler");
  const overlay = document.querySelector(".sidebar-overlay");

  sidebarToggler?.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
  });

  menuToggler?.addEventListener("click", () => {
    sidebar.classList.toggle("menu-active");
    overlay.style.display = sidebar.classList.contains("menu-active") ? "block" : "none";
    const icon = menuToggler.querySelector("span");
    icon.textContent = sidebar.classList.contains("menu-active") ? "close" : "menu";
  });

  overlay?.addEventListener("click", () => {
    sidebar.classList.remove("menu-active");
    overlay.style.display = "none";
    const icon = menuToggler.querySelector("span");
    icon.textContent = "menu";
  });

  // Tambahkan ini:
  if (window.innerWidth <= 1024) {
    sidebar.classList.add("menu-active");
    overlay.style.display = "block";
    const icon = menuToggler?.querySelector("span");
    if (icon) icon.textContent = "close";
  }
});
