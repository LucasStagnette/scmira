<?php 
// fonction pour afficher les clients

function afficherClients()
{
    if(require("connexion.php"))
    {
        $req = $access -> prepare("SELECT * FROM Clients ORDER BY nom");
        $req -> execute();
        $data = $req -> fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req -> closeCursor();
    }
}

function afficherEntreprises()
{
    if(require("Connexion.php"))
    {
        $req = $access -> prepare("SELECT * FROM Entreprises");
        $req -> execute();
        $data = $req -> fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req -> closeCursor();
    }
}