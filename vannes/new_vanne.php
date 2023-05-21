<?php
require '../config/commandes.php';
$repere = strtoupper($_GET['repere']);
$id_collaborateur = $_GET['collaborateur'];

// on verifie que la vanne n'existe deja pas
if (verifVanne($repere)) {
    $url = "exist_vanne.php?repere=" . urlencode($repere) . "&collaborateur=" . urlencode($id_collaborateur);
    header("Location: $url");
}
$collaborateur = afficherCollaborateur($id_collaborateur);

$clients = afficherClients();


// si le bouton sauvegarder est clique
if (isset($_POST["sauvegarder"])) {
    if (isset($_POST["client"]) and isset($_POST["unite"]) and isset($_POST["contact"]) and isset($_POST["produit"]) and isset($_POST["temperature"]) and isset($_POST["marque"]) and isset($_POST["type"]) and isset($_POST["nserie"]) and isset($_POST["entree"]) and isset($_POST["sortie"]) and isset($_POST["pression"]) and isset($_POST["date"])) {
        if (!empty($_POST["client"]) and !empty($_POST["unite"]) and !empty($_POST["contact"]) and !empty($_POST["produit"]) and !empty($_POST["temperature"]) and !empty($_POST["marque"]) and !empty($_POST["type"]) and !empty($_POST["nserie"]) and !empty($_POST["entree"]) and !empty($_POST["sortie"]) and !empty($_POST["pression"]) and !empty($_POST["date"])) {
            $visa = $collaborateur[0]->visa;
            $client = htmlspecialchars(strip_tags($_POST["client"]));
            $unite = htmlspecialchars(strip_tags($_POST["contact"]));
            $contact = htmlspecialchars(strip_tags($_POST["produit"]));
            $produit = htmlspecialchars(strip_tags($_POST["produit"]));
            $temperature = htmlspecialchars(strip_tags($_POST["temperature"]));
            $repere = $repere;
            $marque = htmlspecialchars(strip_tags($_POST["marque"]));
            $type = htmlspecialchars(strip_tags($_POST["type"]));
            $nserie = htmlspecialchars(strip_tags($_POST["nserie"]));
            $entree = htmlspecialchars(strip_tags($_POST["entree"]));
            $sortie = htmlspecialchars(strip_tags($_POST["sortie"]));
            $pression = htmlspecialchars(strip_tags($_POST["pression"]));
            $date = htmlspecialchars(strip_tags($_POST["date"]));

            try {
                // on l'ajoute a la base de donnee
                newVanne($client, $unite, $contact, $produit, $temperature, $repere, $marque, $type, $nserie, $entree, $sortie, $pression, $date, $visa);
                // redirection vers la suite
                $url = "exist_vanne.php?repere=" . urlencode($repere) . "&collaborateur=" . urlencode($id_collaborateur);
                header("Location: $url");
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}
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
        <select name="client" required>
			<?php foreach ($clients as $client) : ?>
				<option value="<?= $client->nom ?>"><?= $client->nom ?></option>
			<?php endforeach ?>
		</select>

        <label>Unité :</label>
        <input name="unite" type="text" required>

        <label>Contact :</label>
        <input name="contact" type="text" required>

        <label>Produit :</label>
        <input name="produit" type="text" required>

        <label>Température :</label>
        <input name="temperature" type="text" required>

        <label>Repère :</label>
        <input disabled name="repere" type="text" value="<?= $repere ?>" required>

        <label>Marque :</label>
        <input name="marque" type="text" required>

        <label>Type :</label>
        <input name="type" type="text" required>

        <label>N°Série :</label>
        <input name="nserie" type="text" required>

        <label>Entrée- DN/PN/connexion :</label>
        <input name="entree" type="text" required>

        <label>Sortie- DN/PN/connexion :</label>
        <input name="sortie" type="text" required>

        <label>Pression tarage :</label>
        <input name="pression" type="text" required>

        <label>Date :</label>
        <input name="date" type="date" value="<?php echo date('Y-m-d'); ?>" required>
        <br>
        <button type="submit" name="sauvegarder">Sauvegarder</button>
        <a href="../index.php">Annuler</a>
    </form>
</body>

</html>