<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMind - Strona główna</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="icon" href="/public/image/img/MyMind.png" type="image/png">
</head>

<body class="page main">
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

    <?php require_once("./App/templates/nav.php") ?>

    <div class="main__container">

        <div class="stats">
            <p class="stats__title">Statystyki</p>
            <div class="stats__container">
                <div class="stats__frame frame">
                    <p class="stats__subtitle">Liczba zadań:</p>
                    <p class="stats__description">Dzisiaj: 4</p>
                    <p class="stats__description">Nadchodzące: 14</p>
                    <p class="stats__description">Zakończone: 12</p>
                    <p class="stats__description">Usunięte: 2</p>
                </div>
                <div class="stats__frame frame">
                    <p class="stats__subtitle">Dzisiaj:</p>
                    <p class="stats__description">Zadania ukończone: 3</p>
                    <p class="stats__description">Zadania nieukończone: 1</p>
                    <p class="stats__description">Zadania usunięte: 2</p>

                </div>
                <div class="stats__frame frame">
                    <p class="stats__subtitle">W tym tygodniu:</p>
                    <p class="stats__description">Zadania ukończone: 3</p>
                    <p class="stats__description">Zadania nieukończone: 1</p>
                    <p class="stats__description">Zadania usunięte: 2</p>
                </div>
                <div class="stats__frame frame">
                    <p class="stats__subtitle">W tym miesiącu:</p>
                    <p class="stats__description">Zadania ukończone: 3</p>
                    <p class="stats__description">Zadania nieukończone: 1</p>
                    <p class="stats__description">Zadania usunięte: 2</p>
                </div>
            </div>

        </div>


        <div class="main__calendar calendar">

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

            <button class="calendar__btn calendar__btn--hide">
                <span class="calendar__icon"></span>
            </button>
        </div>

    </div>

    <div class="main__tasks">
        <p class="main__tasks-title">Najbliższe zadania</p>

        <div class="main__container-tasks">

            <?php if (isset($elements['tasks'])): ?>
                <?php foreach ($elements['tasks'] as $tasks): ?>


                    <div class="task frame tasks__task">
                        <span class="task__category">
                            <?php
                            if (isset($tasks['name'])) {
                                echo $tasks['name'];
                            } else {
                                echo "Brak kategorii";
                            }

                            ?></span>
                        <span class="task__priority"><?php echo $tasks['priority']; ?></span>
                        <p class="task__title"><?php echo $tasks['title']; ?></p>
                        <p class="task__description"><?php echo $tasks['description']; ?></p>
                        <p class="task__end">Koniec:
                            <?php
                            if (isset($tasks['due_date'])) {
                                echo $tasks['due_date'];
                            } else {
                                echo "Brak daty";
                            }

                            ?></p>

                        <p class="task__reminder-mail">Przypomnienie na maila
                            <?php if (isset($tasks['reminder'])): ?>
                                <span class="task__check-reminder"></span>
                            <?php else: ?>
                                <span class="task__check-reminder task__check-reminder--no"></span>
                            <?php endif; ?>
                        </p>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <script src="../../public/js/main-script.js"></script>
        <script src="../../public/js/btns-modal.js"></script>
</body>

</html>