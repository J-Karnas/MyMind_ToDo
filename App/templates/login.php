<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apliakcja To Do do planowania i organizacji zadań">
    <meta name="keywords" content="To Do, tasks, notes, activities, productivity, task planning">
    <title>MyMind - Logowanie</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="icon" href="/public/image/img/MyMind.png" type="image/png">
</head>

<body class="login-page">

    <?php errorhand('error') ?>

    <header class="header-logout">
        <h1 class="header-logout__title">MyMind</h1>
        <div class="header-logout__buttons">
            <a class="header-logout__login header-logout__login--hidden button" href="/login">Zaloguj się</a>
            <a class="header-logout__register header-logout__register--hidden button" href="/register">Zarejestruj się</a>
        </div>
    </header>

    <form class="login-page__form" action="/login" method="post">
        <p class="login-page__title">Zaloguj się</p>
        <input class="login-page__input input" type="text" name="email" placeholder="Email" required>
        <input class="login-page__input input" type="password" name="password" placeholder="Hasło" required>
        <button class="login-page__btn button" type="submit">Zaloguj się</button>
        <p class="login-page__description login-page__description--show"><span class="login-page__description--grey">Nie masz jeszcze konta? </span> <a class="login-page__login-btn" href="/register">Zarejestruj się!</a></p>
    </form>
</body>

</html>