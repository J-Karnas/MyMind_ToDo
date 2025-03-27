// Funkcja do zamykania wszystkich otwartych elementów
function closeAllOpenElements() {
  // Zamknij menu nawigacyjne
  navMenu.classList.remove("nav--show");

  // Zamknij kalendarz
  calendar.classList.remove("calendar--show");
  btnCalendar.classList.remove("calendar__btn--active");
  btnCalendarIcon.classList.remove("calendar__icon--active");

  // Zamknij mobilną listę
  btnMobile.classList.remove("mobile-list__button--active");
  mobileListIcon.classList.remove("mobile-list__icon--active");
  itemList.forEach((item) => {
    item.classList.remove("mobile-list__item--show");
  });
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

// Mobilna lista
const btnMobile = document.querySelector(".mobile-list__button");
const mobileListIcon = document.querySelector(".mobile-list__icon");
const itemList = document.querySelectorAll(".mobile-list__item");

btnMobile.addEventListener("click", (event) => {
  event.stopPropagation();

  // Zamknij inne elementy przed otwarciem mobilnej listy
  if (!btnMobile.classList.contains("mobile-list__button--active")) {
    closeAllOpenElements();
  }
  btnMobile.classList.toggle("mobile-list__button--active");
  mobileListIcon.classList.toggle("mobile-list__icon--active");

  if (btnMobile.classList.contains("mobile-list__button--active")) {
    itemList.forEach((item, index) => {
      setTimeout(() => {
        item.classList.add("mobile-list__item--show");
      }, (itemList.length - 1 - index) * 100);
    });
  } else {
    itemList.forEach((item, index) => {
      setTimeout(() => {
        item.classList.remove("mobile-list__item--show");
      }, index * 100);
    });
  }
});

// Zamykanie mobilnej listy po kliknięciu poza nią
document.addEventListener("click", (event) => {
  const isClickInsideMobileList = Array.from(itemList).some((item) =>
    item.contains(event.target)
  );
  const isClickOnMobileButton = btnMobile.contains(event.target);

  if (!isClickInsideMobileList && !isClickOnMobileButton) {
    btnMobile.classList.remove("mobile-list__button--active");
    mobileListIcon.classList.remove("mobile-list__icon--active");
    itemList.forEach((item, index) => {
      setTimeout(() => {
        item.classList.remove("mobile-list__item--show");
      }, index * 100);
    });
  }
});

// Pokazywanie kalendarza
const calendar = document.querySelector(".calendar");
const btnCalendar = document.querySelector(".calendar__btn");
const btnCalendarIcon = document.querySelector(".calendar__icon");

btnCalendar.addEventListener("click", (event) => {
  event.stopPropagation();

  // Zamknij inne elementy przed otwarciem kalendarza
  if (!calendar.classList.contains("calendar--show")) {
    closeAllOpenElements();
  }
  btnCalendarIcon.classList.toggle("calendar__icon--active");
  btnCalendar.classList.toggle("calendar__btn--active");
  calendar.classList.toggle("calendar--show");
});

// Zamykanie kalendarza po kliknięciu poza nim
document.addEventListener("click", (event) => {
  const isClickInsideCalendar = calendar.contains(event.target);
  const isClickOnCalendarButton = btnCalendar.contains(event.target);

  if (!isClickInsideCalendar && !isClickOnCalendarButton) {
    calendar.classList.remove("calendar--show");
    btnCalendar.classList.remove("calendar__btn--active");
    btnCalendarIcon.classList.remove("calendar__icon--active");
  }
});

// Kalendarz
document.addEventListener("DOMContentLoaded", function () {
  const calendarDays = document.querySelector(".calendar__days");
  const currentMonthElement = document.querySelector(
    ".calendar__current-month"
  );
  const prevMonthButton = document.querySelector(".calendar__prev-month");
  const nextMonthButton = document.querySelector(".calendar__next-month");

  let currentDate = new Date();
  let taskDates = [];

  renderCalendar(currentDate);

  fetchTaskDates();

  // Funkcja do pobierania dat zadań
  async function fetchTaskDates() {
    try {
      const response = await fetch("http://mymind.local/task/date");
      if (!response.ok) throw new Error("Problem z pobraniem danych");
      const data = await response.json();

      taskDates = data.map((item) => item.date);

      renderCalendar(currentDate);
    } catch (error) {
      console.error("Błąd:", error);
    }
  }

  function renderCalendar(date) {
    const year = date.getFullYear();
    const month = date.getMonth();
    const firstDayOfMonth = new Date(year, month, 1);
    const lastDayOfMonth = new Date(year, month + 1, 0);
    const daysInMonth = lastDayOfMonth.getDate();
    const firstDayOfWeek =
      firstDayOfMonth.getDay() === 0 ? 7 : firstDayOfMonth.getDay();
    const daysFromPrevMonth = firstDayOfWeek - 1;
    const daysFromNextMonth = 42 - (daysInMonth + daysFromPrevMonth);

    currentMonthElement.textContent = `${date.toLocaleString("default", {
      month: "long",
    })} ${year}`;

    calendarDays.innerHTML = "";

    // Dni z poprzedniego miesiąca
    const prevMonthLastDay = new Date(year, month, 0).getDate();
    for (let i = daysFromPrevMonth; i > 0; i--) {
      calendarDays.innerHTML += `<div class="calendar__day calendar__day--other-month">${
        prevMonthLastDay - i + 1
      }</div>`;
    }

    // Dni z bieżącego miesiąca
    for (let i = 1; i <= daysInMonth; i++) {
      const day = i < 10 ? `0${i}` : i;
      const monthFormatted = month + 1 < 10 ? `0${month + 1}` : month + 1;
      const dateStr = `${year}-${monthFormatted}-${day}`;

      // Sprawdź czy data jest w tablicy taskDates
      const hasTask = taskDates.includes(dateStr);

      // Dodaj klasę calendar__day--has-task jeśli jest zadanie w tym dniu
      const taskClass = hasTask ? " calendar__day--has-task" : "";

      calendarDays.innerHTML += `<div class="calendar__day${taskClass}" data-date="${dateStr}">${i}</div>`;
    }

    // Dni z następnego miesiąca
    for (let i = 1; i <= daysFromNextMonth; i++) {
      calendarDays.innerHTML += `<div class="calendar__day calendar__day--other-month">${i}</div>`;
    }
  }

  prevMonthButton.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate);
  });

  nextMonthButton.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate);
  });
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
