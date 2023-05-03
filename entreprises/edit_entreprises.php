<?php
require("../config/commandes.php");

// redirige si l'id entreprise n'est pas bien arrive
if (!isset($_GET['id_entreprise'])) {
    header('Location: view_entreprises.php');
}
if (empty($_GET['id_entreprise']) or !is_numeric($_GET['id_entreprise'])) {
    header('Location: view_entreprises.php');
}

$id_entreprise = $_GET['id_entreprise'];
$entreprise = afficherEntreprise($id_entreprise);

// si le bouton modifier est clique
if (isset($_POST['modifier'])) {
    // verifie que les champs sont tous remplis
    if (isset($_POST['nom']) and isset($_POST['telephone']) and isset($_POST['adresse']) and isset($_POST['mail']) and isset($_POST['responsable'])) {
        if (!empty($_POST['nom']) and !empty($_POST['telephone']) and !empty($_POST['adresse']) and !empty($_POST['mail']) and !empty($_POST['responsable'])) {
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $telephone = htmlspecialchars(strip_tags($_POST['telephone']));
            $adresse = htmlspecialchars(strip_tags($_POST['adresse']));
            $mail = htmlspecialchars(strip_tags($_POST['mail']));
            $responsable = htmlspecialchars(strip_tags($_POST['responsable']));
            
            try {
                modifierEntreprise($nom, $telephone, $adresse, $mail, $responsable, $id_entreprise);
                header("Location: view_entreprises.php");
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
    <title>Modification Entreprise</title>
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
    <?php foreach ($entreprise as $entreprise_info) : ?>
        <!-- Formulaire pour editer une entreprise -->
        <form method="post">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?= $entreprise_info->nom ?>" placeholder="Nom du client..." required>
            </div>

            <div>
                <label for="telephone">Téléphone</label>
                <input type="number" id="telephone" name="telephone" value="<?= $entreprise_info->telephone ?>" placeholder="Telephone..." required>
            </div>

            <div>
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" value="<?= $entreprise_info->adresse ?>" placeholder="Adresse..." required>
            </div>

            <div>
                <label for="mail">E-mail</label>
                <input type="text" id="mail" name="mail" value="<?= $entreprise_info->mail ?>" placeholder="E-mail..." required>
            </div>

            <div>
                <label for="responsable">Responsable</label>
                <input type="text" id="responsable" name="responsable" value="<?= $entreprise_info->responsable ?>" placeholder="Responsable..." required>
            </div>

            <br>
            <!-- bouton modifier -->
            <input type="submit" name="modifier" value="Modifier">
        </form>
    <?php endforeach ?>
</body>

</html>