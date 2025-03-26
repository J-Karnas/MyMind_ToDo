<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMind - Zakończone</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="icon" href="/public/image/img/MyMind.png" type="image/png">
</head>

<body class="page ">

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

        <form method="get" action="/ended">

            <header class="tasks__header">
                <div class="tasks__container-list">

                    <span class="tasks__btn-category-title">Kategorie
                        <span class="tasks__icon-default"></span>
                    </span>

                    <ul class="tasks__category-list tasks__category-list--hidden">
                        <li class="tasks__category-item">
                            Brak kategorii
                            <input type="checkbox" name="categoriesNone[]" value="none" class="tasks__category-value" checked>
                        </li>
                        <?php if (isset($elements['category'])): ?>
                            <?php foreach ($elements['category'] as $category): ?>
                                <li class="tasks__category-item">
                                    <?php echo $category['name']; ?>
                                    <input type="checkbox" name="categories[]" value="<?php echo $category['id']; ?>" class="tasks__category-value" checked>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>

                </div>

                <div class="tasks__container-list">

                    <span class="tasks__btn-sort-title">Sortowanie
                        <span class="tasks__icon-default "></span>
                    </span>

                    <ul class="tasks__sort-list tasks__sort-list--hidden">
                        <li class="tasks__sort-item">
                            Czas zakończenia rosnąco
                            <input type="checkbox" class="tasks__sort-value" name="sort" value="1">
                        </li>
                        <li class="tasks__sort-item">
                            Czas zakończenia malejąco
                            <input type="checkbox" class="tasks__sort-value" name="sort" value="2">
                        </li>
                        <li class="tasks__sort-item">
                            Priorytet rosnąco
                            <input type="checkbox" class="tasks__sort-value" name="sort" value="3">
                        </li>
                        <li class="tasks__sort-item">
                            Priorytet malejąco
                            <input type="checkbox" class="tasks__sort-value" name="sort" value="4">
                        </li>
                    </ul>

                </div>

                <button class="tasks__btn button">Zastosuj</button>

            </header>

        </form>

        <div class="tasks__container">

            <?php if (isset($elements['tasks'])): ?>
                <?php foreach ($elements['tasks'] as $tasks): ?>


                    <div class="task frame tasks__task">
                    <input type="hidden" class="previewTaskId" value="<?php echo $tasks['id']; ?>">
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

    </div>


    <script src="../../public/js/main-script.js"></script>
    <script src="../../public/js/btns-modal.js"></script>
    <script src="../../public/js/task-pages.js"></script>
</body>

</html>