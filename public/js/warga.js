document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.querySelector(".sidebar");
  const sidebarToggler = document.querySelector(".sidebar-toggler");
  const menuToggler = document.querySelector(".menu-toggler");

  if (sidebar && sidebarToggler && menuToggler) {
    sidebarToggler.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
    });

    menuToggler.addEventListener("click", () => {
      sidebar.classList.toggle("menu-active");
      const icon = menuToggler.querySelector("span");
      icon.textContent = sidebar.classList.contains("menu-active") ? "close" : "menu";
    });
  }
});
