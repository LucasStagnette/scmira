<?php
require("../config/commandes.php");

$entreprises = afficherEntreprises();


// si le bouton ajouter client est clique
if (isset($_POST["valider"])) {
    if (isset($_POST["nom"]) and isset($_POST["telephone"]) and isset($_POST["mail"]) and isset($_POST["responsable"]) and isset($_POST["entreprise"])) {
        if (!empty($_POST["nom"]) and !empty($_POST["telephone"]) and !empty($_POST["mail"]) and !empty($_POST["responsable"]) and !empty($_POST["entreprise"])) {
            $nom = htmlspecialchars(strip_tags($_POST["nom"]));
            $telephone = htmlspecialchars(strip_tags($_POST["telephone"]));
            $mail = htmlspecialchars(strip_tags($_POST["mail"]));
            $responsable = htmlspecialchars(strip_tags($_POST["responsable"]));
            $id_entreprise = htmlspecialchars(strip_tags($_POST["entreprise"]));

            try {
                newClient($nom, $telephone, $mail, $responsable, $id_entreprise);
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
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <meta charset="utf-8" />
    <title>Nouveau Client</title>
</head>

<body>
    <!-- formulaire pour ajouter un client -->
    <form method="post">
        <label>Remplisser les champs suivants pour ajouter un client</label>

        <div>
            <label for="nom">Nom :</label>
            <input type="name" name="nom" placeholder="Nom..." required>
        </div>

        <div>
            <label for="telephone">Téléphone :</label>
            <input type="text" name="telephone" placeholder="Numéro de téléphone..." required>
        </div>

        <div>
            <label for="mail">E-mail :</label>
            <input type="text" name="mail" placeholder="E-mail..." required>
        </div>

        <div>
            <label for="responsable">Responsable :</label>
            <input type="text" name="responsable" placeholder="Responsable..." required>
        </div>

        <!-- menu déroulant des entreprises -->
        <div>
            <label for="entreprise">Entreprise :</label>
            <select name="entreprise">
                <?php foreach ($entreprises as $entreprise) : ?>
                    <option value="<?= $entreprise->id_entreprise ?>"><?= $entreprise->nom ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" name="valider" value="Ajouter le client">
    </form>
    <!-- bouton annuler -->
    <button onclick="location.href='view_clients.php'">Retour</button>
</body>

</html>