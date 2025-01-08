<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMind - Rejestracja</title>
</head>

<body>

    <?php errorhand('error') ?>

    <form action="/register" method="post">
        <input type="text" name="userName" placeholder="Nazwa użytkownika" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="phoneNumber" placeholder="Numer telefonu">
        <input type="password" name="password" placeholder="Hasło" required>
        <input type="password" name="repeatPassword" placeholder="Powtórz hasło" required>
        <button type="submit">Zarejestruj się</button>
    </form>
</body>

</html>