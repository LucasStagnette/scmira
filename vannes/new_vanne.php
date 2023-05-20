<?php
require '../config/commandes.php';
$repere = $_GET['repere'];
$id_collaborateur = $_GET['collaborateur'];

$collaborateur = afficherCollaborateur($id_collaborateur);

$clients = afficherClients();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $repere ?></title>
    <link rel="stylesheet" type="text/css" href="../style2.css">
    <!-- Icone -->
    <link rel="shortcut icon" href="../annexe/logo_scmira.ico" type="image/x-icon" />
    <link rel="icon" href="../annexe/logo_scmira.ico" type="image/x-icon" />
</head>

<body>
    <form id="repere" method="post">
        <label>Remplissez les informations en tant que <?= strtoupper($collaborateur[0]->prenom) ?> <?= strtoupper($collaborateur[0]->nom) ?></label>

        <label>Client :</label>
        <select name="identite">
			<?php foreach ($clients as $client) : ?>
				<option value="<?= $client->id_client ?>"><?= $client->nom ?></option>
			<?php endforeach ?>
		</select>

        <label>Unité :</label>
        <input required>

        <label>Contact :</label>
        <input required>

        <label>Produit :</label>
        <input required>

        <label>Température :</label>
        <input required>

        <label>Repère :</label>
        <input value="<?= $repere ?>" required>

        <label>Marque :</label>
        <input required>

        <label>Type :</label>
        <input required>

        <label>N°Série :</label>
        <input required>

        <label>Entrée- DN/PN/connexion :</label>
        <input required>

        <label>Sortie- DN/PN/connexion :</label>
        <input required>

        <label>Pression tarage :</label>
        <input required>

        <label>Date :</label>
        <input type="date"  required>
    </form>
</body>

</html>