<?php 
require("config/commandes.php");

$collaborateurs = afficherCollaborateurs();

if (isset($_POST['afficher'])) {

	if (isset($_POST['identite'])) {

		$repere = htmlspecialchars(strip_tags($_POST['serial-number']));
		$collaborateur = htmlspecialchars(strip_tags($_POST['identite']));
		// rediriger ici l'utilisateur vers la page de la vanne avec les variables en paramètre

	} else {
		$error_message = "Veuillez sélectionner une option de la liste déroulante.";
	}
}
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
			<form method="post">

				<div>
					<label>Identifez-vous</label>
					<select name="identite">
						<option selected disabled>Sélectionnez une option</option>
						<?php foreach($collaborateurs as $collaborateur) : ?>
							<option value="<?= $collaborateur->id_collab?>"><?= $collaborateur->prenom?> <?= $collaborateur->nom?></option>
						<?php endforeach ?>
					</select>
				</div>

				<?php if (isset($error_message)) : ?>
					<p><?= $error_message ?></p>
				<?php endif ?>

				<label>Entrez le repère de la vanne</label>
				<input placeholder="Repère de la vanne..." type="number" id="serial-number" required name="serial-number">
				<button name="afficher" type="submit">Afficher</button>
			</form>
		</div>
	</main>
</body>
</html>
