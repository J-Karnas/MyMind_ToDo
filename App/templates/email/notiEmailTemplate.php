<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Powiadomienie o zadaniu</title>
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
      color: #0c0b0b;
      font-size: 16px;
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

    .table-container {
      max-width: 500px;
      margin: auto;
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
      border: 1px solid #0c0b0b;
    }

    th {
      background-color: #ffffff;
      color: #0c0b0b;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Powiadomienie o zadaniach do wykonania</h2>
    <p>
      Cześć,
      <?= htmlspecialchars($name) ?>!
    </p>
    <p>
      To powiadomienie o liczbie zadań do zrealizowania
      <?= htmlspecialchars($type) ?>:
      <strong><?= htmlspecialchars($count) ?></strong>.
    </p>
    <table>
      <thead>
        <tr>
          <th>Tytuł zadania</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($titleTasks as $key) : ?>
          <tr>
            <td><?= htmlspecialchars($key['title']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <p>Aby sprawdzić szczegóły i wykonać zadania, przejdź do aplikacji:</p>
    <a href="<?= htmlspecialchars($link) ?>" class="button">Zobacz zadania</a>
    <p class="footer">
      Pozdrawiamy, <br />
      Zespół MyMaind
    </p>
  </div>
</body>

</html>