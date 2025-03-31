<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>MyMind - Ostrzeżenie</title>
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

		.alert {
			background-color: #f8d7da;
			color: #721c24;
			padding: 10px;
			border-radius: 5px;
			margin-bottom: 15px;
		}
	</style>
</head>

<body>
	<div class="container">
		<h2>Ostrzeżenie o podejrzanej aktywności</h2>
		<p class="alert">Wykryto nieudane próby logowania na Twoje konto.</p>

		<p>Jeśli to nie Ty próbowałeś się zalogować, <strong>zresetuj swoje hasło</strong>, aby zabezpieczyć konto.</p>

		<a href="<?= htmlspecialchars($reset_link) ?>" class="button">Zmień hasło</a>

		<p class="footer">Jeśli to Ty próbowałeś się zalogować, możesz zignorować tę wiadomość.</p>
	</div>
</body>

</html>