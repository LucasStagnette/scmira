<?php
require("../config/commandes.php");

// redirige si l'id entreprise n'est pas bien arrive
if (!isset($_GET['id_collab'])) {
    header('Location: view_collaborateurs.php');
}
if (empty($_GET['id_collab']) or !is_numeric($_GET['id_collab'])) {
    header('Location: view_collaborateurs.php');
}

$id_collab = $_GET['id_collab'];
$collaborateur = afficherCollaborateur($id_collab);

// si le bouton modifier est clique
if (isset($_POST['modifier'])) {
    // verifie que les champs sont tous remplis
    if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['visa']) and isset($_POST['telephone']) and isset($_POST['statut'])) {
        if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['visa']) and !empty($_POST['telephone']) and !empty($_POST['statut'])) {
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
            $visa = htmlspecialchars(strip_tags($_POST['visa']));
            $telephone = htmlspecialchars(strip_tags($_POST['telephone']));
            $statut = htmlspecialchars(strip_tags($_POST['statut']));
            
            try {
                modifierCollaborateur($nom, $prenom, $visa, $telephone, $statut, $id_collab);
                header("Location: view_collaborateurs.php");
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
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <meta charset="utf-8" />
    <title>Modification</title>
</head>

<body>
    <header>
        <nav>
            <ul class="navbar_l">
                <li class="navbar_e"><a class="navbar_a" href="../index.php">Accueil</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../clients/view_clients.php">Clients</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../entreprises/view_entreprises.php">Entreprises</a></li>
                <li class="navbar_e"><a class="navbar_a" href="view_collaborateurs.php">Collaborateurs</a></li>
            </ul>
        </nav>
    </header>
    <?php foreach ($collaborateur as $collaborateur_info) : ?>
        <!-- Formulaire pour editer une entreprise -->
        <form method="post">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?= $collaborateur_info->nom ?>" placeholder="Nom du client..." required>
            </div>

            <div>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?= $collaborateur_info->prenom ?>" placeholder="Prénom..." required>
            </div>

            <div>
                <label for="visa">Visa</label>
                <input type="text" id="visa" name="visa" value="<?= $collaborateur_info->visa ?>" placeholder="Visa..." required>
            </div>

            <div>
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" value="<?= $collaborateur_info->telephone ?>" placeholder="Téléphone..." required>
            </div>

            <div>
                <label for="statut">Statut</label>
                <input type="text" id="statut" name="statut" value="<?= $collaborateur_info->statut ?>" placeholder="Statut..." required>
            </div>

            <br>
            <!-- bouton modifier -->
            <input type="submit" name="modifier" value="Modifier">
        </form>
        <!-- bouton annuler -->
        <button onclick="location.href='view_collaborateurs.php'">Annuler</button>
    <?php endforeach ?>
</body>

</html>