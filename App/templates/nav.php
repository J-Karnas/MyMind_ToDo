<nav class="nav">
    <ul class="nav__list">
        <ul class="nav__sublist">
            <p class="nav__section-name">Strona główna</p>
            <li class="nav__item">
                <a href="/main" class="nav__link">Strona główna</a>
            </li>
        </ul>

        <ul class="nav__sublist">
            <p class="nav__section-name">Zadania</p>
            <li class="nav__item nav__item--hidden">
                <a href="/#" class="nav__link nav__link--add-task">Dodaj zadanie</a>
            </li>
            <li class="nav__item">
                <a href="/viewTasks" class="nav__link">Wszystkie zadania</a>
            </li>
            <li class="nav__item">
                <a href="/today" class="nav__link">Na dzisiaj</a>
            </li>
            <li class="nav__item">
                <a href="/upcoming" class="nav__link">Przyszły tydzień</a>
            </li>
            <li class="nav__item">
                <a href="/ended" class="nav__link">Zakończone</a>
            </li>
        </ul>

        <ul class="nav__sublist">
            <p class="nav__section-name">Kategorie</p>
            <li class="nav__item nav__item--hidden">
                <a href="/#" class="nav__link nav__link--add-category">Dodaj kategorie</a>
            </li>
            <li class="nav__item">
                <a href="/viewCategories" class="nav__link">Lista kategorii</a>
            </li>
        </ul>

        <ul class="nav__sublist">
            <p class="nav__section-name">Notatki</p>
            <li class="nav__item nav__item--hidden">
                <a href="/#" class="nav__link nav__link--add-note">Dodaj notatkę</a>
            </li>
            <li class="nav__item">
                <a href="/notes" class="nav__link">Lista notatek</a>
            </li>
        </ul>

        <ul class="nav__sublist nav__sublist--hidden">
            <p class="nav__section-name">Ustawienia</p>
            <li class="nav__item">
                <a href="/settings" class="nav__link">Profil</a>
            </li>
        </ul>
    </ul>
    <a href="logout"><span class="nav__logout"></span></a>
</nav>

<nav class="mobile-list">
    <button class="mobile-list__button"><span class="mobile-list__icon"></span>
    </button>

    <ul class="mobile-list__sublist">
        <li class="mobile-list__item mobile-list__item--1">
            <a href="/#" class="mobile-list__link nav__link--add-task">Zadanie</a>
        </li>
        <li class="mobile-list__item mobile-list__item--2">
            <a href="/#" class="mobile-list__link nav__link--add-category">Kategoria</a>
        </li>
        <li class="mobile-list__item mobile-list__item--3">
            <a href="/#" class="mobile-list__link nav__link--add-note">Notatka</a>
        </li>
    </ul>
</nav>