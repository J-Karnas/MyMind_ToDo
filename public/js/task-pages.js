document.addEventListener("DOMContentLoaded", function () {
  // Pobierz elementy dla kategorii
  const categoryButton = document.querySelector(".tasks__btn-category-title");
  const categoryList = document.querySelector(".tasks__category-list");
  const categoryIcon = categoryButton?.querySelector(".tasks__icon-default");

  // Pobierz elementy dla sortowania
  const sortButton = document.querySelector(".tasks__btn-sort-title");
  const sortList = document.querySelector(".tasks__sort-list");
  const sortIcon = sortButton?.querySelector(".tasks__icon-default");

  // Funkcja do zamykania listy sortowania
  function closeSortList() {
    if (sortList && sortIcon) {
      sortList.classList.add("tasks__sort-list--hidden");
      sortIcon.classList.remove("tasks__icon-default--up");
    }
  }

  // Funkcja do zamykania listy kategorii
  function closeCategoryList() {
    if (categoryList && categoryIcon) {
      categoryList.classList.add("tasks__category-list--hidden");
      categoryIcon.classList.remove("tasks__icon-default--up");
    }
  }

  // Funkcja do obsługi kliknięcia w przycisk kategorii
  if (categoryButton && categoryList && categoryIcon) {
    categoryButton.addEventListener("click", function (event) {
      event.stopPropagation(); // Zapobiega natychmiastowemu zamknięciu listy
      categoryList.classList.toggle("tasks__category-list--hidden"); // Przełącz widoczność listy
      categoryIcon.classList.toggle("tasks__icon-default--up"); // Przełącz ikonę

      // Zamknij listę sortowania, jeśli jest otwarta
      closeSortList();

      // Zamknij inne otwarte elementy (calendar, nav-mobile, nav)
      closeAllOpenElements();
    });

    // Zamknij listę, jeśli kliknięto poza nią
    document.addEventListener("click", function (event) {
      if (
        !categoryList.contains(event.target) &&
        !categoryButton.contains(event.target)
      ) {
        closeCategoryList();
      }
    });
  }

  // Funkcja do obsługi kliknięcia w przycisk sortowania
  if (sortButton && sortList && sortIcon) {
    sortButton.addEventListener("click", function (event) {
      event.stopPropagation(); // Zapobiega natychmiastowemu zamknięciu listy
      sortList.classList.toggle("tasks__sort-list--hidden"); // Przełącz widoczność listy
      sortIcon.classList.toggle("tasks__icon-default--up"); // Przełącz ikonę

      // Zamknij listę kategorii, jeśli jest otwarta
      closeCategoryList();

      // Zamknij inne otwarte elementy (calendar, nav-mobile, nav)
      closeAllOpenElements();
    });

    // Zamknij listę, jeśli kliknięto poza nią
    document.addEventListener("click", function (event) {
      if (
        !sortList.contains(event.target) &&
        !sortButton.contains(event.target)
      ) {
        closeSortList();
      }
    });
  }

  // Zamykanie po kliknięciu w mobile-nav i calendar
  const calendarBtn = document.querySelector(".calendar__btn");
  const mobileListBtn = document.querySelector(".mobile-list__button");
  const burgerLink = document.querySelector(".header-login__link--burger");

  // Funkcja do zamykania list
  function closeLists() {
    closeCategoryList();
    closeSortList();
  }

  // Zamknij listy po kliknięciu w przycisk kalendarza
  if (calendarBtn) {
    calendarBtn.addEventListener("click", function () {
      closeLists();
    });
  }

  // Zamknij listy po kliknięciu w przycisk mobilnej listy
  if (mobileListBtn) {
    mobileListBtn.addEventListener("click", function () {
      closeLists();
    });
  }

  // Zamknij listy po kliknięciu w link burgera w headerze
  if (burgerLink) {
    burgerLink.addEventListener("click", function () {
      closeLists();
    });
  }
});

// Funkcja do zamykania wszystkich otwartych elementów (calendar, nav-mobile, nav)
function closeAllOpenElements() {
  // Zamknij menu nawigacyjne
  const navMenu = document.querySelector(".nav");
  if (navMenu) {
    navMenu.classList.remove("nav--show");
  }

  // Zamknij kalendarz
  const calendar = document.querySelector(".calendar");
  const btnCalendar = document.querySelector(".calendar__btn");
  const btnCalendarIcon = document.querySelector(".calendar__icon");
  if (calendar && btnCalendar && btnCalendarIcon) {
    calendar.classList.remove("calendar--show");
    btnCalendar.classList.remove("calendar__btn--active");
    btnCalendarIcon.classList.remove("calendar__icon--active");
  }

  // Zamknij mobilną listę
  const btnMobile = document.querySelector(".mobile-list__button");
  const mobileListIcon = document.querySelector(".mobile-list__icon");
  const itemList = document.querySelectorAll(".mobile-list__item");
  if (btnMobile && mobileListIcon && itemList) {
    btnMobile.classList.remove("mobile-list__button--active");
    mobileListIcon.classList.remove("mobile-list__icon--active");
    itemList.forEach((item) => {
      item.classList.remove("mobile-list__item--show");
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Pobierz wszystkie checkboxy w liście sortowania
  const sortCheckboxes = document.querySelectorAll(".tasks__sort-value");

  // Dodaj nasłuchiwanie na zmianę stanu każdego checkboxa
  sortCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      // Jeśli ten checkbox jest zaznaczony
      if (this.checked) {
        // Odznacz wszystkie inne checkboxy
        sortCheckboxes.forEach((otherCheckbox) => {
          if (otherCheckbox !== this) {
            otherCheckbox.checked = false;
          }
        });
      }
    });
  });
});
