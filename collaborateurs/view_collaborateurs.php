<?php
// Inclusion du fichier de commandes pour accéder aux fonctions nécessaires
require("../config/commandes.php");

// Appel de la fonction pour récupérer la liste des clients
$collaborateurs = afficherCollaborateurs();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <meta charset="utf-8" />
    <title>Collaborateurs</title>
</head>

<body>
    <header>
        <nav>
            <ul class="navbar_l">
                <li class="navbar_e"><a class="navbar_a" href="../index.php">Accueil</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../clients/view_clients.php">Clients</a></li>
                <li class="navbar_e"><a class="navbar_a" href="../entreprises/view_entreprises.php">Entreprises</a></li>
            </ul>
        </nav>
    </header>
    <!-- Bouton pour ajouter un collaborateur -->
    <button class="btn-back" onclick="location.href='add_collaborateurs.php'">Ajouter un collaborateur</button>
    <div class="tableauclients">
        <!-- Tableau pour afficher la liste des collaborateurs -->
        <table id="table">
            <thead>
                <!-- Entêtes des colonnes avec la possibilité de trier en cliquant dessus -->
                <tr>
                    <th onclick="sortTable(0)">Nom</th>
                    <th onclick="sortTable(1)">Prénom</th>
                    <th onclick="sortTable(4)">Visa</th>
                    <th onclick="sortTable(2)">Téléphone</th>
                    <th onclick="sortTable(3)">Statut</th>
                    <th>ㅤㅤEdition</th>
                </tr>
            </thead>

            <tbody>
                <!-- Parcours de la liste des entreprises pour les afficher dans le tableau -->
                <?php foreach ($collaborateurs as $collaborateur) : ?>
                    <tr>
                        <td><?= $collaborateur->nom ?></td>
                        <td><?= $collaborateur->prenom ?></td>
                        <td><?= $collaborateur->visa ?></td>
                        <td><?= $collaborateur->telephone ?></td>
                        <td><?= $collaborateur->statut ?></td>
                        <td>
                            <!-- Bouton pour modifier un collaborateur -->
                            <button class="btn-modifier">
                                <a href="edit_collaborateurs.php?id_collab=<?= $collaborateur->id_collab ?>">
                                    <img src="../annexe/logo_edit.png" alt="Modifier" />
                                </a>
                            </button>
                            <!-- Bouton pour supprimer un client -->
                            <button class="btn-supprimer">
                                <a href="../config/commandes.php?action=supprimercollaborateur&id_collab=<?= $collaborateur->id_collab ?>&from_view=true">
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