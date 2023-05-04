<?php
require("../config/commandes.php");

// si le bouton ajouter client est clique
if (isset($_POST["valider"])) {
    if (isset($_POST["nom"]) and isset($_POST["telephone"]) and isset($_POST["adresse"]) and isset($_POST["mail"]) and isset($_POST["responsable"])) {
        if (!empty($_POST["nom"]) and !empty($_POST["telephone"]) and !empty($_POST["adresse"]) and !empty($_POST["mail"]) and !empty($_POST["responsable"])) {
            $nom = htmlspecialchars(strip_tags($_POST["nom"]));
            $telephone = htmlspecialchars(strip_tags($_POST["telephone"]));
            $adresse = htmlspecialchars(strip_tags($_POST["adresse"]));
            $mail = htmlspecialchars(strip_tags($_POST["mail"]));
            $responsable = htmlspecialchars(strip_tags($_POST["responsable"]));

            try {
                newEntreprise($nom, $telephone, $adresse, $mail, $responsable);
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
    <link rel="stylesheet" type="text/css" href="../style2.css" />
    <meta charset="utf-8" />
    <title>Nouvelle Entreprise</title>
    <!-- Icone -->
    <link rel="shortcut icon" href="../annexe/logo_scmira.ico" type="image/x-icon" />
    <link rel="icon" href="../annexe/logo_scmira.ico" type="image/x-icon" />
</head>

<body>
    <header>
        <center>
            <nav>
                <ul class="navbar_l">
                    <li class="navbar_e"><a class="navbar_a" href="../index.php">Accueil</a></li>
                    <li class="navbar_e"><a class="navbar_a" href="../clients/view_clients.php">Clients</a></li>
                    <li class="navbar_e"><a class="navbar_a" href="view_entreprises.php">Entreprises</a></li>
                    <li class="navbar_e"><a class="navbar_a" href="../collaborateurs/view_collaborateurs.php">Collaborateurs</a></li>
                </ul>
            </nav>
        </center>
    </header>
    <!-- formulaire pour ajouter une entreprise -->
    <form method="post">
        <label>Remplisser les champs suivants pour ajouter une entreprise</label>

        <div>
            <label for="nom">Nom :</label>
            <input type="name" name="nom" placeholder="Nom..." required>
        </div>

        <div>
            <label for="telephone">Téléphone :</label>
            <input type="number" name="telephone" placeholder="Numéro de téléphone..." required>
        </div>

        <div>
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" placeholder="Adresse..." required>
        </div>

        <div>
            <label for="mail">E-mail :</label>
            <input type="text" name="mail" placeholder="E-mail..." required>
        </div>

        <div>
            <label for="responsable">Responsable :</label>
            <input type="text" name="responsable" placeholder="Responsable..." required>
        </div>

        <input type="submit" name="valider" value="Ajouter l'entreprise">
    </form>
</body>

</html>