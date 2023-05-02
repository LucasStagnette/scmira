<?php 
require("config/commandes.php");
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
	<header>
        <nav>
            <ul class="navbar_l">
                <li class="navbar_e"><a class="navbar_a" href="clients/view_clients.php">Clients</a></li>
                <li class="navbar_e"><a class="navbar_a" href="entreprises/view_entreprises.php">Entreprises</a></li>
                <li class="navbar_e"><a class="navbar_a" href="collaborateurs/view_collaborateurs.php">Collaborateurs</a></li>
            </ul>
        </nav>
    </header>
	<main>
		<div id="repere">
			<p>Entrez le repère de la vanne</p>
			<form action="page-code.html">
				<input placeholder="Repère de la vanne..." type="text" id="serial-number" name="serial-number">
				<button type="submit">Envoyer</button>
			</form>
		</div>
	</main>
</body>
</html>