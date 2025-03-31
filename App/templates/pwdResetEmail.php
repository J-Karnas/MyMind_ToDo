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

    <form class="login-page__form" action="/pwd/sendToken" method="post">
        <p class="login-page__title">Reset hasła</p>
        <input class="login-page__input input" type="text" name="email" placeholder="Email" required>
        <button class="login-page__btn button" type="submit">Wyślij email</button>
    </form>
</body>

</html>