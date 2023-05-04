<?php
require("../config/commandes.php");

// si le bouton ajouter collaborateur est clique
if (isset($_POST["valider"])) {
    if (isset($_POST["nom"]) and isset($_POST["prenom"]) and isset($_POST["visa"]) and isset($_POST["telephone"]) and isset($_POST["statut"])) {
        if (!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["visa"]) and !empty($_POST["telephone"]) and !empty($_POST["statut"])) {
            $nom = htmlspecialchars(strip_tags($_POST["nom"]));
            $prenom = htmlspecialchars(strip_tags($_POST["prenom"]));
            $visa = htmlspecialchars(strip_tags($_POST["visa"]));
            $telephone = htmlspecialchars(strip_tags($_POST["telephone"]));
            $statut = htmlspecialchars(strip_tags($_POST["statut"]));

            try {
                newCollaborateur($nom, $prenom, $visa, $telephone, $statut);
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
    <title>Nouveau Collaborateur</title>
	<!-- Icone -->
    <link rel="shortcut icon" href="annexe/logo_scmira.ico" type="image/x-icon" />
    <link rel="icon" href="annexe/logo_scmira.ico" type="image/x-icon" />
</head>

<body>
    <header>
        <center>
        <nav>
            <ul class="navbar_l">
                <li class="navbar_e"><a class="navbar_a" href="../index.php">Accueil</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../clients/view_clients.php">Clients</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../entreprises/view_entreprises.php">Entreprises</a></li>
                <li class="navbar_e"><a class="navbar_a" href="view_collaborateurs.php">Collaborateurs</a></li>
            </ul>
        </nav>
        </center>
    </header>
    <!-- formulaire pour ajouter un collaborateur -->
    <form method="post">
        <label>Remplisser les champs suivants pour ajouter un collaborateur</label>

        <div>
            <label for="nom">Nom :</label>
            <input type="name" name="nom" placeholder="Nom..." required>
        </div>

        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" placeholder="Prénom..." required>
        </div>

        <div>
            <label for="visa">Visa :</label>
            <input type="text" name="visa" placeholder="Visa..." required>
        </div>

        <div>
            <label for="telephone">Téléphone :</label>
            <input type="number" name="telephone" placeholder="Téléphone..." required>
        </div>

        <div>
            <label for="statut">Statut :</label>
            <input type="text" name="statut" placeholder="Statut..." required>
        </div>

        <input type="submit" name="valider" value="Ajouter le collaborateur">
    </form>
</body>
</html>