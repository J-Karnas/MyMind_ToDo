<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Przypomnienie o zadaniu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #0c0b0b;
      padding: 20px;
      text-align: left;
    }

    .container {
      background-color: #fff;
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      margin: 0 auto;
    }

    h2 {
      color: #0c0b0b;
    }

    p {
      font-size: 16px;
      line-height: 1.3;
    }

    a {
      text-decoration: none;
    }

    .button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: #0c0b0b;
      background-color: #ffffff;
      padding: 10px 30px;
      border: 1px solid #0c0b0b;
      border-radius: 30px;
      cursor: pointer;
      transition: 0.3s;
    }

    .button:hover {
      color: #ffffff;
      background-color: #0c0b0b;
    }

    .footer {
      margin-top: 20px;
      font-size: 12px;
      color: rgba(12, 11, 11, 0.5);
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Reset hasła</h2>
    <p>Aby zmienić hasło kliknij w przycisk poniżej:</p>

    <a href="<?= htmlspecialchars($resertPwdLink) ?>" class="button">Zmień hasło</a>
    <p class="footer">
      Pozdrawiamy, <br />
      Zespół MyMaind
    </p>
  </div>
</body>

</html>