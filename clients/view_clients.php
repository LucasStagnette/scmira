<?php
// Inclusion du fichier de commandes pour accéder aux fonctions nécessaires
require("../config/commandes.php");

// Appel de la fonction pour récupérer la liste des clients
$clients = afficherClients();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <meta charset="utf-8" />
    <title>Clients</title>
    <!-- Icone -->
    <link rel="shortcut icon" href="annexe/logo_scmira.ico" type="image/x-icon" />
    <link rel="icon" href="annexe/logo_scmira.ico" type="image/x-icon" />
</head>

<body>
    <header>
        <nav>
            <ul class="navbar_l">
                <li class="navbar_e"><a class="navbar_a" href="../index.php">Accueil</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../entreprises/view_entreprises.php">Entreprises</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../collaborateurs/view_collaborateurs.php">Collaborateurs</a></li>
            </ul>
        </nav>
    </header>
    <!-- Bouton pour ajouter un client -->
    <button class="btn-back" onclick="location.href='add_client.php'">Ajouter un client</button>
    <div class="tableauclients">
        <!-- Tableau pour afficher la liste des clients -->
        <table id="table">
            <thead>
                <!-- Entêtes des colonnes avec la possibilité de trier en cliquant dessus -->
                <tr>
                    <th onclick="sortTable(0)">Nom</th>
                    <th onclick="sortTable(1)">Téléphone</th>
                    <th onclick="sortTable(2)">E-mail</th>
                    <th onclick="sortTable(3)">Responsable</th>
                    <th onclick="sortTable(4)">Entreprise</th>
                    <th>ㅤㅤEdition</th>
                </tr>
            </thead>

            <tbody>
                <!-- Parcours de la liste des clients pour les afficher dans le tableau -->
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client->nom ?></td>
                        <td><?= $client->telephone ?></td>
                        <td><?= $client->mail ?></td>
                        <td><?= $client->responsable ?></td>
                        <td><?= $client->e_nom ?></td>
                        <td>
                            <!-- Bouton pour modifier un client -->
                            <button class="btn-modifier">
                                <a href="edit_client.php?id_client=<?= $client->id_client ?>">
                                    <img src="../annexe/logo_edit.png" alt="Modifier" />
                                </a>
                            </button>
                            <!-- Bouton pour supprimer un client -->
                            <button class="btn-supprimer">
                                <a href="../config/commandes.php?action=supprimerclient&id_client=<?= $client->id_client ?>&from_view=true">
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

<!-- Fonction JavaScript pour trier le tableau selon la colonne sur laquelle on a cliqué -->
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