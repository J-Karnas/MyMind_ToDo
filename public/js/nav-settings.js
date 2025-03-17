// Funkcja do zamykania wszystkich otwartych elementów
function closeAllOpenElements() {
  // Zamknij menu nawigacyjne
  navMenu.classList.remove("nav--show");
}

// Nawigacja
const btnBurger = document.querySelector(".header-login__link--burger");
const navMenu = document.querySelector(".nav");

btnBurger.addEventListener("click", (event) => {
  event.preventDefault();
  event.stopPropagation();

  // Zamknij inne elementy przed otwarciem menu
  if (!navMenu.classList.contains("nav--show")) {
    closeAllOpenElements();
  }
  navMenu.classList.toggle("nav--show");
});

// Zamykanie menu nawigacyjnego po kliknięciu poza nim
document.addEventListener("click", (event) => {
  if (!navMenu.contains(event.target)) {
    navMenu.classList.remove("nav--show");
  }
});

// Obsługa nawigacji
const navItems = document.querySelectorAll(".nav__item");
const currentPath = window.location.pathname;

navItems.forEach((item) => {
  const link = item.querySelector(".nav__link");

  if (link.getAttribute("href") === currentPath) {
    item.classList.add("nav__item--active");
  }
});
