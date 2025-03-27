<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apliakcja To Do do planowania i organizacji zadań">
    <meta name="keywords" content="To Do, tasks, notes, activities, productivity, task planning">
    <title>MyMind - Notatki</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="icon" href="/public/image/img/MyMind.png" type="image/png">
</head>

<body class="page notes">

    <?php errorhand('error') ?>
    <?php require_once("./App/templates/modals.php") ?>

    <header class="header-login">
        <h1 class="header-login__title">MyMind</h1>
        <div class="header-login__buttons">
            <a class="header-login__link header-login__link--account" href="/settings">
                <img class="header-login__icon" src="/public/image/svg-icons/account.svg" alt="ikona użytkownika">
            </a>
            <a class="header-login__link header-login__link--burger" href="/">
                <img class="header-login__icon" src="/public/image/svg-icons/menu-burger.svg" alt="ikona listy rozwijanej">
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


    <div class="notes__container">

        <?php if (isset($elements['note'])): ?>
            <?php foreach ($elements['note'] as $note): ?>
                <div class="notes__note note frame">
                    <p class="notes__note-title"><?php echo $note['title']; ?></p>
                    <p class="notes__note-description">
                        <?php echo $note['description']; ?>
                    </p>
                    <input type="hidden" value="<?php echo $note['id']; ?>" class="previewNoteId">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>









    <script src="../../public/js/main-script.js"></script>
    <script src="../../public/js/btns-modal.js"></script>
</body>

</html>