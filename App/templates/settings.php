<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMind - Ustawienia</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="icon" href="/public/image/img/MyMind.png" type="image/png">
</head>

<body class="page">
    <?php errorhand('error') ?>

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
                <li class="nav__item">
                    <a href="/viewCategories" class="nav__link">Lista kategorii</a>
                </li>
            </ul>


            <ul class="nav__sublist">
                <p class="nav__section-name">Notatki</p>
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


    <div class="settings">
        <h2 class="settings__title">Cześć <?php echo $elements['username']; ?>, co chciałbyś zrobić?</h2>
        <div class="settings__container">

            <form method="post" action="/settings/nameEdit" class="settings__form settings__form--about-me frame">
                <p class="settings__subtitle">O mnie</p>
                <input type="text" class="settings__input input" placeholder="Nazwa użytkownika" name="nameEdit">
                <button class="settings__btn button">Zastosuj</button>
            </form>

            <form method="post" action="/settings/pwdEdit" class="settings__form frame">
                <p class="settings__subtitle">Zmień hasło</p>
                <input type="password" class="settings__input input" placeholder="Nowe hasło" name="passwordEdit">
                <input type="password" class="settings__input input" placeholder="Powtórz hasło" name="repeatPasswordEdit">
                <button class="settings__btn button">Zastosuj</button>
            </form>

            <form method="post" action="/settings/delAllData" class="settings__form frame">
                <p class="settings__subtitle">Usuń wszystkie dane</p>
                <input type="password" class="settings__input input" placeholder="Hasło" name="password">
                <input type="password" class="settings__input input" placeholder="Powtórz hasło" name="repeatPassword">
                <button class="settings__btn button">Zastosuj</button>
            </form>

            <form method="post" action="/settings/delAccount" class="settings__form frame">
                <p class="settings__subtitle">Usuń konto</p>
                <input type="password" class="settings__input input" placeholder="Hasło" name="password">
                <input type="password" class="settings__input input" placeholder="Powtórz hasło" name="repeatPassword" >
                <button class="settings__btn button">Zastosuj</button>
            </form>

            <form action="" class="settings__form settings__form--btn frame">
                <p class="settings__subtitle">Zmień język</p>
                <button class="settings__btn button settings__button--pl">Polski</button>
                <button class="settings__btn button settings__button--en">Angielski</button>
            </form>

            <form action="" class="settings__form settings__form--btn frame">
                <p class="settings__subtitle">Wybierz motyw</p>
                <button class="settings__btn button settings__button--bright">Jasny</button>
                <button class="settings__btn button settings__button--dark">Ciemny</button>
            </form>

        </div>


    </div>












    <script src="../../public/js/nav-settings.js"></script>
</body>

</html>