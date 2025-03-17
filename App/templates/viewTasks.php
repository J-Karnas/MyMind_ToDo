<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMind - Zadania</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body class="page viewTasks">

    <?php errorhand('error') ?>
    <?php require_once("./App/templates/modals.php") ?>

    <header class="header-login">
        <h1 class="header-login__title">MyMind</h1>
        <div class="header-login__buttons">
            <a class="header-login__link header-login__link--account" href="/settings">
                <img class="header-login__icon" src="/public/image/svg-icons/account.svg">
            </a>
            <a class="header-login__link header-login__link--burger" href="/">
                <img class="header-login__icon" src="/public/image/svg-icons/menu-burger.svg">
            </a>
        </div>
    </header>

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
                    <a href="/viewTasks" class="nav__link">Lista zadań</a>
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
                <p class="nav__section-name">Przegląd zadań</p>
                <li class="nav__item">
                    <a href="/today" class="nav__link">Dzisiaj</a>
                </li>
                <li class="nav__item">
                    <a href="/upcoming" class="nav__link">Nadchodzące</a>
                </li>
                <li class="nav__item">
                    <a href="/ended" class="nav__link">Zakończone</a>
                </li>
                <li class="nav__item">
                    <a href="/remove" class="nav__link">Usunięte</a>
                </li>
            </ul>

            <ul class="nav__sublist">
                <p class="nav__section-name">Pozostałe</p>
                <li class="nav__item nav__item--hidden">
                    <a href="/#" class="nav__link nav__link--add-note">Dodaj notatkę</a>
                </li>
                <li class="nav__item">
                    <a href="/notes" class="nav__link">Notatki</a>
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

    <div class="calendar calendar--other-page">

        <div class="calendar__header">
            <button class="calendar__prev-month">&lt;</button>
            <h2 class="calendar__current-month"></h2>
            <button class="calendar__next-month">&gt;</button>
        </div>
        <div class="calendar__days-name">
            <div class="calendar__day-name">Pn</div>
            <div class="calendar__day-name">Wt</div>
            <div class="calendar__day-name">Śr</div>
            <div class="calendar__day-name">Cz</div>
            <div class="calendar__day-name">Pt</div>
            <div class="calendar__day-name">So</div>
            <div class="calendar__day-name">Ni</div>
        </div>
        <div class="calendar__days"></div>

        <button class="calendar__btn calendar__btn--hide calendar__btn--other-page">
            <span class="calendar__icon"></span>
        </button>
    </div>


    <div class="tasks">

        <header class="tasks__header">
            <div class="tasks__container-list">

                <span class="tasks__btn-category-title">Kategorie
                    <span class="tasks__icon-default"></span>
                </span>

                <ul class="tasks__category-list tasks__category-list--hidden">
                    <li class="tasks__category-item">
                        Home
                        <input type="checkbox" class="tasks__category-value">
                    </li>
                    <li class="tasks__category-item">
                        Car
                        <input type="checkbox" class="tasks__category-value">
                    </li>
                    <li class="tasks__category-item">
                        Hobby
                        <input type="checkbox" class="tasks__category-value">
                    </li>
                </ul>
            </div>

            <div class="tasks__container-list">

                <span class="tasks__btn-sort-title">Sortowanie
                    <span class="tasks__icon-default "></span>
                </span>

                <ul class="tasks__sort-list tasks__sort-list--hidden">
                    <li class="tasks__sort-item">
                        Czas zakończenia rosnąco
                        <input type="checkbox" class="tasks__sort-value">
                    </li>
                    <li class="tasks__sort-item">
                        Czas zakończenia malejąco
                        <input type="checkbox" class="tasks__sort-value">
                    </li>
                    <li class="tasks__sort-item">
                        Priorytet rosnąco
                        <input type="checkbox" class="tasks__sort-value">
                    </li>
                    <li class="tasks__sort-item">
                        Priorytet malejąco
                        <input type="checkbox" class="tasks__sort-value">
                    </li>
                </ul>
            </div>
        </header>

        <div class="tasks__container">

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Lorem ipsum odor amet, consectetuer adipiscing elit. Bibendum habitant eu molestie urna purus molestie pretium? Justo ante scelerisque donec etiam posuere eros cras litora. Dui consequat maximus libero donec nam massa tortor pulvinar amet. Sociosqu ac sit ultricies facilisi tempor parturient. Lorem ipsum odor amet, consectetuer adipiscing elit. Bibendum habitant eu molestie urna purus molestie pretium? Justo ante scelerisque donec etiam posuere eros cras litora. Dui consequat maximus libero donec nam massa tortor pulvinar amet. Sociosqu ac sit ultricies facilisi tempor parturient.</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Jakiś tam opis krótki max 50 znaków się wywietli...</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Jakiś tam opis krótki max 50 znaków się wywietli...</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Jakiś tam opis krótki max 50 znaków się wywietli...</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Jakiś tam opis krótki max 50 znaków się wywietli...</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Jakiś tam opis krótki max 50 znaków się wywietli...</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Jakiś tam opis krótki max 50 znaków się wywietli...</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

            <div class="task frame tasks__task">
                <span class="task__category">Dom</span>
                <span class="task__priority">III</span>
                <p class="task__title">Mycie okien 1</p>
                <p class="task__description">Jakiś tam opis krótki max 50 znaków się wywietli...</p>
                <p class="task__end">Koniec: 25.05.2025</p>
                <p class="task__reminder-mail">Przypomnienie na maila<span class="task__check-reminder task__check-reminder--no"></span></p>
            </div>

        </div>

    </div>



    <script src="../../public/js/main-script.js"></script>
    <script src="../../public/js/btns-modal.js"></script>
    <script src="../../public/js/task-pages.js"></script>
</body>

</html>