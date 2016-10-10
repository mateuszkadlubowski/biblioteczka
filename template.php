<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<title>Moja Biblioteczka</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	</head>
	<body>
		<header>
			<h1><a href="?page=home"><img src="img/logo.png" class="logo"> Moja Biblioteczka </a></h1>
		</header>
		<nav>
			<h2>MENU</h2>
			<ul>
				<li>
					<a href="?page=show">Wyświetl</a>
				</li>
				<li>
					<a href="?page=add">Dodaj</a>
				</li>
				<li>
					<a href="?page=manage">Zarządzaj</a>
				</li>
			</ul>
		</nav>
		<section>
			<?
			include 'page/' . $content;
			?>
		</section>
	</body>
</html>
