<?php 
require("config/commandes.php");

$collaborateurs = afficherCollaborateurs();

// bouton vanne appuyer
if (isset($_POST['afficher'])) {
	if (isset($_POST['identite'])) {

		$repere = htmlspecialchars(strip_tags($_POST['serial-number']));
		$repere = strtoupper($repere);
		$collaborateur = htmlspecialchars(strip_tags($_POST['identite']));

		// on verifie si la vanne est deja rentre dans la base de donnee
		if (verifVanne($repere)) {
			$url = "vannes/exist_vanne.php?repere=" . urlencode($repere) . "&collaborateur=" . urlencode($collaborateur);
			header("Location: $url");
		}
		else {
			$url = "vannes/new_vanne.php?repere=" . urlencode($repere) . "&collaborateur=" . urlencode($collaborateur);
			header("Location: $url");
		} 

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
	<title>Identification</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<!-- Icone -->
    <link rel="shortcut icon" href="annexe/logo_scmira.ico" type="image/x-icon" />
    <link rel="icon" href="annexe/logo_scmira.ico" type="image/x-icon" />
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
				<input placeholder="Repère de la vanne..." type="text" id="serial-number" required name="serial-number">
				<button name="afficher" type="submit">Afficher</button>
			</form>
		</div>
	</main>
</body>
</html>
