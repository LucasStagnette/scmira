<?php
require("../config/commandes.php");

// redirige si l'id client n'est pas bien arrive
if (!isset($_GET['id_client'])) {
    header('Location: view_clients.php');
}
if (empty($_GET['id_client']) or !is_numeric($_GET['id_client'])) {
    header('Location: view_clients.php');
}

$id_client = $_GET['id_client'];
$client = afficherClient($id_client);
$entreprises = afficherEntreprises();

// si le bouton modifier est clique
if (isset($_POST['modifier'])) {
    // verifie que les champs sont tous remplis
    if (isset($_POST['nom']) and isset($_POST['telephone']) and isset($_POST['mail']) and isset($_POST['responsable']) and isset($_POST['entreprise'])) {
        if (!empty($_POST['nom']) and !empty($_POST['telephone']) and !empty($_POST['mail']) and !empty($_POST['responsable']) and !empty($_POST['entreprise'])) {
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $telephone = htmlspecialchars(strip_tags($_POST['telephone']));
            $mail = htmlspecialchars(strip_tags($_POST['mail']));
            $responsable = htmlspecialchars(strip_tags($_POST['responsable']));
            $id_entreprise = htmlspecialchars(strip_tags($_POST['entreprise']));
            
            try {
                modifierClient($nom, $telephone, $mail, $responsable, $id_entreprise, $id_client);
                header("Location: view_clients.php");
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
    <title>Modification Client</title>
</head>

<body>
    <header>
        <center>
        <nav>
            <ul class="navbar_l">
                <li class="navbar_e"><a class="navbar_a" href="../index.php">Accueil</a></li>
                <li class="navbar_e"><a class="navbar_a" href="view_clients.php">Clients</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../entreprises/view_entreprises.php">Entreprises</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../collaborateurs/view_collaborateurs.php">Collaborateurs</a></li>
            </ul>
        </nav>
        </center>
    </header>
    <?php foreach ($client as $client_info) : ?>
        <!-- Formulaire pour editer un client -->
        <form method="post">
            <div>
                <label for="nom">Nom du client</label>
                <input type="text" id="nom" name="nom" value="<?= $client_info->nom ?>" placeholder="Nom du client..." required>
            </div>

            <div>
                <label for="telephone">Téléphone</label>
                <input type="number" id="telephone" name="telephone" value="<?= $client_info->telephone ?>" placeholder="Telephone..." required>
            </div>

            <div>
                <label for="mail">E-mail</label>
                <input type="text" id="mail" name="mail" value="<?= $client_info->mail ?>" placeholder="E-mail..." required>
            </div>

            <div>
                <label for="responsable">Responsable</label>
                <input type="text" id="responsable" name="responsable" value="<?= $client_info->responsable ?>" placeholder="Responsable..." required>
            </div>

            <div>
                <label>Entreprise</label>
                <select name='entreprise'>
                    <?php foreach ($entreprises as $entreprise) : ?>
                        <option value="<?= $entreprise->id_entreprise ?>" <?php if ($client_info->id_entreprise == $entreprise->id_entreprise) echo 'selected'; ?>><?= $entreprise->nom ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <br>
            <!-- bouton modifier -->
            <input type="submit" name="modifier" value="Modifier">
        </form>
    <?php endforeach ?>
</body>

</html>