<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witaj w MyMaind!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h2 {
            color: #1A8D60;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 15px;
            text-decoration: none;
            background-color: #1A8D60;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #207a56;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Witaj, <?= htmlspecialchars($name) ?>!</h2>
        <p>Dziękujemy za dołączenie do <strong>MyMaind</strong>. Cieszymy się, że jesteś z nami!</p>
        <p>Aby aktywować swoje konto, kliknij poniższy przycisk:</p>
        <a href="<?= htmlspecialchars($activationLink) ?>" class="button">Aktywuj konto</a>
        <p>Jeśli to nie Ty zakładałeś konto, zignoruj tę wiadomość.</p>
        <p class="footer">Pozdrawiamy, <br> Zespół MyMaind</p>
    </div>
</body>
</html>