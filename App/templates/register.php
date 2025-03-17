<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMind - Rejestracja</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body class="register-page">

    <?php errorhand('error') ?>

    <header class="header-logout">
        <h1 class="header-logout__title">MyMind</h1>
        <div class="header-logout__buttons">
            <a class="header-logout__login header-logout__login--hidden button" href="/login">Zaloguj się</a>
            <a class="header-logout__register header-logout__register--hidden button" href="/register">Zarejestruj się</a>
        </div>
    </header>

    <form class="register-page__form" action="/register" method="post">
        <p class="register-page__title">Zarejestruj się</p>
        <input class="register-page__input input" type="text" name="userName" placeholder="Nazwa użytkownika" required>
        <input class="register-page__input input" type="text" name="email" placeholder="Email" required>
        <input class="register-page__input input" type="password" name="password" placeholder="Hasło" required>
        <input class="register-page__input input" type="password" name="repeatPassword" placeholder="Powtórz hasło" required>
        <button class="register-page__btn button" type="submit">Zarejestruj się</button>
        <p class="register-page__description register-page__description--show"><span class="register-page__description--grey">Masz już konto? </span> <a class="register-page__login-btn" href="/login">Zaloguj się!</a></p>
    </form>
</body>

</html>