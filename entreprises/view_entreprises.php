<?php
// Inclusion du fichier de commandes pour accéder aux fonctions nécessaires
require("../config/commandes.php");

// Appel de la fonction pour récupérer la liste des clients
$entreprises = afficherEntreprises();

if (isset($_POST['valider'])) {
    $id_entreprise = htmlspecialchars(strip_tags($_POST['id_entreprise']));
    deleteclients($id_entreprise);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <meta charset="utf-8" />
    <title>Entreprises</title>
</head>

<body>
    <header>
        <nav>
            <ul class="navbar_l">
                <li class="navbar_e"><a class="navbar_a" href="../index.php">Accueil</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../clients/view_clients.php">Clients</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../collaborateurs/view_collaborateurs.php">Collaborateurs</a></li>
            </ul>
        </nav>
    </header>
    <!-- Bouton pour ajouter une entreprise -->
    <button class="btn-back" onclick="location.href='add_entreprises.php'">Ajouter une entreprise</button>

    <!-- probleme clef etrangere et resolution -->
    <h2>Attention l'entreprise ne se supprimera pas si un client en fait parti !</h2>
    <p>Avec le bouton ci-dessous vous pouvez supprimer tous les clients appartenant à une entreprise</p>
    <form method="post">
        <select name="id_entreprise">
            <option>-------</option>
            <?php foreach ($entreprises as $entreprise) :?>
                <option value="<?= $entreprise->id_entreprise ?>"><?= $entreprise->nom ?></option>
            <?php endforeach ?>
        </select>
        <input type="Submit" value="Supprimer les clients" name="valider">
    </form>
    <div class="tableauclients">
        <!-- Tableau pour afficher la liste des entreprises -->
        <table id="table">
            <thead>
                <!-- Entetes des colonnes avec la possibilite de trier en cliquant dessus -->
                <tr>
                    <th onclick="sortTable(0)">Nom</th>
                    <th onclick="sortTable(1)">Téléphone</th>
                    <th onclick="sortTable(4)">Adresse</th>
                    <th onclick="sortTable(2)">E-mail</th>
                    <th onclick="sortTable(3)">Responsable</th>
                    <th>ㅤㅤEdition</th>
                </tr>
            </thead>

            <tbody>
                <!-- Parcours de la liste des entreprises pour les afficher dans le tableau -->
                <?php foreach ($entreprises as $entreprise) : ?>
                    <tr>
                        <td><?= $entreprise->nom ?></td>
                        <td><?= $entreprise->telephone ?></td>
                        <td><?= $entreprise->adresse ?></td>
                        <td><?= $entreprise->mail ?></td>
                        <td><?= $entreprise->responsable ?></td>
                        <td>
                            <!-- Bouton pour modifier un client -->
                            <button class="btn-modifier">
                                <a href="edit_entreprises.php?id_entreprise=<?= $entreprise->id_entreprise ?>">
                                    <img src="../annexe/logo_edit.png" alt="Modifier" />
                                </a>
                            </button>
                            <!-- Bouton pour supprimer un client -->
                            <button class="btn-supprimer">
                                <a href="../config/commandes.php?action=supprimerentreprise&id_entreprise=<?= $entreprise->id_entreprise ?>&from_view=true">
                                    <img src="../annexe/logo_suppr.png" alt="Supprimer" />
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<!-- Fonction JavaScript pour trier le tableau selon la colonne sur laquelle on a clique -->
<script>
    function sortTable(columnIndex) {
        let table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector('table');
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < rows.length - 1; i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[columnIndex];
                y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>