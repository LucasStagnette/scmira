<?php
require("../config/commandes.php");
$clients = afficherClients();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <meta charset="utf-8" />
    <title>Clients</title>
</head>

<body>
    <button class="btn-back" onclick="location.href='../index.php'">Retour</button>
    <button class="btn-back" onclick="location.href='add_client.php'">Ajouter un client</button>
    <div class="tableauclients">
        <table id="table">
            <thead>
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
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client->nom ?></td>
                        <td><?= $client->telephone ?></td>
                        <td><?= $client->mail ?></td>
                        <td><?= $client->responsable ?></td>
                        <td><?= $client->e_nom ?></td>
                        <td>
                            <!-- bouton modifier -->
                            <button class="btn-modifier">
                                <a href="edit_client.php?id_client=<?=$client->id_client?>">
                                    <img src="../annexe/logo_edit.png" alt="Modifier" />
                                </a>
                            </button>
                            <button class="btn-supprimer">
                                <img src="../annexe/logo_suppr.png" alt="Supprimer" />
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<script>
    // fonction pour trier par ordre croissant selon la colonne sur laquelle on a clique
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
