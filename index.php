<?php 
require("./config/commandes.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Repere Vanne</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<main>
		<div id="repere">
			<p>Entrez le repère de la vanne</p>
			<form action="page-code.html">
				<input placeholder="Repère de la vanne..." type="text" id="serial-number" name="serial-number">
				<button type="submit">Envoyer</button>
			</form>
		</div>
		<div id="boutonclient">
			<a href="./clients/view_clients.php"><button>Clients</button></a>
		</div>
	</main>
</body>
</html>