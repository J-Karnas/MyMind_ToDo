const addTaskModal = document.querySelector(".modal--addTaskModal");
const editTaskModal = document.querySelector(".modal--editTaskModal");
const previewTaskModal = document.querySelector(".modal--previewTaskModal");

const addCategoryModal = document.querySelector(".modal--addCategoryModal");
const editCategoryModal = document.querySelector(".modal--editCategoryModal");
const previewCategoryModal = document.querySelector(
  ".modal--previewCategoryModal"
);

const addNoteModal = document.querySelector(".modal--addNoteModal");
const editNoteModal = document.querySelector(".modal--editNoteModal");
const previewNoteModal = document.querySelector(".modal--previewNoteModal");

// Obsługa przycisków "Dodaj zadanie", "Dodaj kategorię" i "Dodaj notatkę"
const addTaskButton = document.querySelector(".nav__link--add-task");
const addCategoryButton = document.querySelector(".nav__link--add-category");
const addNoteButton = document.querySelector(".nav__link--add-note");

// Funkcja do otwierania modala
function openModal(modal) {
  if (modal) {
    modal.classList.remove("modal--hide");
  }
}

// Funkcja do zamykania modala
function closeModal(modal) {
  if (modal) {
    modal.classList.add("modal--hide");
  }
}

if (addTaskButton) {
  addTaskButton.addEventListener("click", (event) => {
    event.preventDefault();
    openModal(addTaskModal);
    console.log("Dodaj zadanie");
  });
}

if (addCategoryButton) {
  addCategoryButton.addEventListener("click", (event) => {
    event.preventDefault();
    openModal(addCategoryModal);
    console.log("Dodaj kategorię");
  });
}

if (addNoteButton) {
  addNoteButton.addEventListener("click", (event) => {
    event.preventDefault();
    openModal(addNoteModal);
    console.log("Dodaj notatkę");
  });
}

// Zamykanie modali po kliknięciu poza ich obszar
document.addEventListener("click", (event) => {
  if (event.target.classList.contains("modal")) {
    closeModal(event.target);
    console.log("zamknięcie poza obszarem");
  }
});

// Zamykanie modali po naciśnięciu przycisku "Anuluj"
document.querySelectorAll(".form__btn--cancel").forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    const modal = button.closest(".modal");
    closeModal(modal);
    console.log("zamknięcie przyciskiem");
  });
});

// Obsługa przycisków w mobilnej liście
const mobileAddTaskButton = document.querySelector(
  ".mobile-list__link.nav__link--add-task"
);
const mobileAddCategoryButton = document.querySelector(
  ".mobile-list__link.nav__link--add-category"
);
const mobileAddNoteButton = document.querySelector(
  ".mobile-list__link.nav__link--add-note"
);

// Zamykanie mobilnej listy

function closeMobileList() {
  btnMobile.classList.remove("mobile-list__button--active");
  mobileListIcon.classList.remove("mobile-list__icon--active");
  itemList.forEach((item, index) => {
    setTimeout(() => {
      item.classList.remove("mobile-list__item--show");
    }, index * 100);
  });
}

if (mobileAddTaskButton) {
  mobileAddTaskButton.addEventListener("click", (event) => {
    event.preventDefault();
    openModal(addTaskModal);
    console.log("Dodaj zadanie (mobile)");
    closeMobileList();
  });
}

if (mobileAddCategoryButton) {
  mobileAddCategoryButton.addEventListener("click", (event) => {
    event.preventDefault();
    openModal(addCategoryModal);
    console.log("Dodaj kategorię (mobile)");
    closeMobileList();
  });
}

if (mobileAddNoteButton) {
  mobileAddNoteButton.addEventListener("click", (event) => {
    event.preventDefault();
    openModal(addNoteModal);
    console.log("Dodaj notatkę (mobile)");
    closeMobileList();
  });
}

// Otwieranie zadań, kategorii i notatek
const taskInfoModal = document.querySelectorAll(".task");
const categoryInfoModal = document.querySelectorAll(".category");
const noteInfoModal = document.querySelectorAll(".note");

// Notatki
noteInfoModal.forEach((note) => {
  note.addEventListener("click", () => {
    const title = note.querySelector(".notes__note-title").textContent;
    const description = note.querySelector(
      ".notes__note-description"
    ).textContent;
    const noteId = note.querySelector(".previewNoteId").value;

    const previewTitle = previewNoteModal.querySelector(".form__title--note");
    const previewDescription = previewNoteModal.querySelector(
      ".form__description--note"
    );
    const previewId = previewNoteModal.querySelector(".previewNoteId");

    console.log(previewTitle.textContent.trim());

    if (previewTitle) {
      previewTitle.textContent = title;
    }

    console.log(previewDescription.textContent.trim());

    if (previewDescription) {
      previewDescription.textContent = description;
    }
    console.log(previewId.value.trim());

    if (previewId) {
      previewId.value = noteId;
    }

    openModal(previewNoteModal);
  });
});

// Kategorie

categoryInfoModal.forEach((category) => {
  category.addEventListener("click", () => {
    const title = category.querySelector(
      ".viewCategories__category-title"
    ).textContent;

    const categoryEditId = category.querySelector(".previewCategoryId").value;

    const previewTitle = previewCategoryModal.querySelector(
      ".form__title--category"
    );

    const previewNoteId =
      previewCategoryModal.querySelector(".previewCategoryId");

    if (previewTitle) {
      previewTitle.textContent = title.trim();
    }

    if (previewNoteId) {
      previewNoteId.value = categoryEditId.trim();
    }

    openModal(previewCategoryModal);
  });
});

// Zadania

taskInfoModal.forEach((task) => {
  task.addEventListener("click", () => {
    const taskEditId = task.querySelector(".previewTaskId").value;
    const category = task.querySelector(".task__category").textContent;
    const priority = task.querySelector(".task__priority").textContent;
    const title = task.querySelector(".task__title").textContent;
    const description = task.querySelector(".task__description").textContent;
    const endDate = task.querySelector(".task__end").textContent;
    const reminder = task.querySelector(".task__check-reminder");

    const previewTaskId = previewTaskModal.querySelector(".previewTaskId");
    const previewTitle = previewTaskModal.querySelector(".form__title--title");
    const previewDescription = previewTaskModal.querySelector(
      ".form__title--description"
    );
    const previewCategory = previewTaskModal.querySelector(
      ".form__title--category"
    );
    const previewPriority = previewTaskModal.querySelector(
      ".form__title--priority"
    );
    const previewEndDate = previewTaskModal.querySelector(
      ".form__title--end-date"
    );

    const previewReminder = previewTaskModal.querySelector(
      ".previewTaskReminder"
    );

    if (previewTaskId) {
      previewTaskId.value = taskEditId;
    }

    if (previewTitle) {
      previewTitle.textContent = title;
    }
    if (previewDescription) {
      previewDescription.textContent = description;
    }

    if (previewCategory) {
      previewCategory.textContent = `Kategoria: ${category}`;
    }

    if (previewPriority) {
      previewPriority.textContent = `Priorytet: ${priority}`;
    }
    if (previewEndDate) previewEndDate.textContent = `${endDate}`;

    if (previewReminder) {
      if (reminder.classList.contains("task__check-reminder--no")) {
        previewReminder.value = "reminderNo";
      } else {
        previewReminder.value = "reminderYes";
      }
    }

    openModal(previewTaskModal);
  });
});

//
//
//

document.addEventListener("DOMContentLoaded", function () {
  // Funkcja do obsługi zmiany stanu checkboxa
  function handleCheckboxChange(checkbox, selectElement) {
    // Sprawdź, czy checkbox jest odznaczony
    if (!checkbox.checked) {
      selectElement.disabled = true; // Dezaktywuj listę wyboru
      selectElement.value = "null"; // Ustaw wartość na "Brak przypomnień"
    } else {
      selectElement.disabled = false; // Aktywuj listę wyboru
    }
  }

  // Obsługa dla modala dodawania zadania
  const addTaskCheckbox = document.querySelector(
    '.modal--addTaskModal input[name="checkboxReminder"]'
  );
  const addTaskSelect = document.querySelector(
    '.modal--addTaskModal select[name="notification"]'
  );

  if (addTaskCheckbox && addTaskSelect) {
    // Dodaj nasłuchiwanie na zmianę stanu checkboxa
    addTaskCheckbox.addEventListener("change", function () {
      handleCheckboxChange(addTaskCheckbox, addTaskSelect);
    });

    // Sprawdź stan checkboxa przy ładowaniu strony
    handleCheckboxChange(addTaskCheckbox, addTaskSelect);
  }

  // Obsługa dla modala edycji zadania
  const editTaskCheckbox = document.querySelector(
    '.modal--editTaskModal input[name="checkboxReminderEdit"]'
  );
  const editTaskSelect = document.querySelector(
    '.modal--editTaskModal select[name="notificationEdit"]'
  );

  if (editTaskCheckbox && editTaskSelect) {
    // Dodaj nasłuchiwanie na zmianę stanu checkboxa
    editTaskCheckbox.addEventListener("change", function () {
      handleCheckboxChange(editTaskCheckbox, editTaskSelect);
    });

    // Sprawdź stan checkboxa przy ładowaniu strony
    handleCheckboxChange(editTaskCheckbox, editTaskSelect);
  }
});

//
//
//

function setSelectedCategory(category) {
  const selectElement = document.querySelector(
    '.modal--editTaskModal select[name="categoryEdit"]'
  );

  if (!selectElement) return;

  // Trim the category name and remove "Kategoria: " prefix if present
  const categoryName = category.replace(/^Kategoria:\s*/i, "").trim();

  // Find the option that matches the category name
  const options = selectElement.options;
  for (let i = 0; i < options.length; i++) {
    if (options[i].textContent.trim() === categoryName) {
      selectElement.selectedIndex = i;
      return;
    }
  }

  // If no match found, select "Brak kategorii"
  selectElement.value = "null";
}

function setSelectedPriority(priorityText) {
  const prioritySelect = document.querySelector(
    '.modal--editTaskModal select[name="priorityEdit"]'
  );

  if (!prioritySelect) return;

  // Usuń prefix "Priorytet: " i białe znaki
  const cleanPriority = priorityText.replace(/^Priorytet:\s*/i, "").trim();

  // Mapowanie tekstu priorytetu na wartości
  const priorityMap = {
    I: "1",
    II: "2",
    III: "3",
    IV: "4",
    V: "5",
  };

  // Znajdź odpowiednią wartość
  const priorityValue = priorityMap[cleanPriority] || "null";

  // Ustaw wybraną opcję
  prioritySelect.value = priorityValue;
}

//
//
//

document.querySelectorAll(".form__edit-document").forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();

    // Znajdź najbliższy modal podglądu
    const previewModal = button.closest(".modal");
    closeModal(previewModal);

    // Określ typ modala (task, category, note) na podstawie klasy
    if (previewModal.classList.contains("modal--previewTaskModal")) {
      // Pobierz dane z modala podglądu zadania

      const previewId = previewModal.querySelector(".previewTaskId").value;
      const title = previewModal.querySelector(
        ".form__title--title"
      ).textContent;
      const description = previewModal.querySelector(
        ".form__title--description"
      ).textContent;
      const category = previewModal.querySelector(
        ".form__title--category"
      ).textContent;
      const priority = previewModal.querySelector(
        ".form__title--priority"
      ).textContent;
      const endDate = previewModal.querySelector(
        ".form__title--end-date"
      ).textContent;

      // const reminder = previewModal.querySelector(".previewTaskReminder").value;

      //

      // Otwórz modal edycji zadania
      const editTaskModal = document.querySelector(".modal--editTaskModal");
      if (editTaskModal) {
        editTaskModal.querySelector(".editTaskId").value = previewId.trim();

        editTaskModal.querySelector(
          ".form__input[name='titleTaskEdit']"
        ).value = title.trim();

        editTaskModal.querySelector(
          ".form__textarea[name='descriptionTaskEdit']"
        ).value = description.trim();

        setSelectedCategory(category);

        setSelectedPriority(priority);

        const date = endDate.replace(/^Koniec:\s*/i, "").trim();

        function convertToISODate(dateString) {
          const [day, month, year] = dateString.split("-");
          const date = new Date(`${year}-${month}-${day}`);

          return date.toISOString().split("T")[0];
        }

        editTaskModal.querySelector(".form__reminders-date").value =
          convertToISODate(date);

        openModal(editTaskModal);
      }
    } else if (previewModal.classList.contains("modal--previewCategoryModal")) {
      // Pobierz dane z modala podglądu kategorii

      const previewId = previewModal.querySelector(".previewCategoryId").value;

      const title = previewModal.querySelector(
        ".form__title--category"
      ).textContent;

      // Otwórz modal edycji kategorii

      const editCategoryModal = document.querySelector(
        ".modal--editCategoryModal"
      );
      if (editCategoryModal) {
        // Wypełnij pole formularza w modalu kategorii

        editCategoryModal.querySelector(".editCategoryId").value =
          previewId.trim();

        editCategoryModal.querySelector(
          ".form__input[placeholder='Nazwa kategorii']"
        ).value = title.trim();

        // Otwórz modal edycji kategorii
        openModal(editCategoryModal);
      }
    } else if (previewModal.classList.contains("modal--previewNoteModal")) {
      // Pobierz dane z modala podglądu notatki

      const id = previewModal.querySelector(".previewNoteId").value;
      console.log(id);

      const title =
        previewModal.querySelector(".form__title--note").textContent;
      const description = previewModal.querySelector(
        ".form__description--note"
      ).textContent;

      // Otwórz modal edycji notatki
      const editNoteModal = document.querySelector(".modal--editNoteModal");
      if (editNoteModal) {
        // Wypełnij pola formularza w modalach edycji

        editNoteModal.querySelector(".editNoteId").value = id.trim();

        editNoteModal.querySelector(
          ".form__input[placeholder='Tytuł notatki']"
        ).value = title;
        editNoteModal.querySelector(".form__textarea").value =
          description.trim();

        // Otwórz modal edycji notatki
        openModal(editNoteModal);
      }
    }
  });
});
