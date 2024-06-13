// Cache DOM elements
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const theme = document.querySelector(".theme-toggler");

// Event listeners
menuBtn.addEventListener("click", () => {
  sideMenu.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  sideMenu.style.display = "none";
});


theme.addEventListener("click", () => {
  document.body.classList.toggle("dark-theme");
  theme.querySelectorAll("span").forEach((span) => {
    span.classList.toggle("active");
  });
}); 