<?php 




// renvoie toutes les infos des clients par ordre de nom
function afficherClients()
{
    if(require("connexion.php"))
    {
        $req = $access -> prepare("SELECT c.id_client, c.nom, c.telephone, c.mail, c.responsable, e.nom as e_nom FROM clients c, entreprises e where c.id_entreprise = e.id_entreprise ORDER BY c.nom");

        $req -> execute();
        $data = $req -> fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req -> closeCursor();
    }
}


// affiche les infos d'un cient
function afficherClient($id)
{
    if(require("connexion.php"))
    {
        $req = $access -> prepare("SELECT * FROM clients WHERE id_client=$id");
        $req -> execute();
        $data = $req -> fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req -> closeCursor();
    }
}


// renvoie toutes les infos des entreprises
function afficherEntreprises()
{
    if(require("connexion.php"))
    {
        $req = $access -> prepare("SELECT * FROM entreprises");
        $req -> execute();
        $data = $req -> fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req -> closeCursor();
    }
}

// fonction pour modifier les informations d'un client
function modifierClient($nom, $telephone, $mail, $responsable, $id_entreprise, $id)
{
    if(require("connexion.php")){
        // requete pour modifier la table clients
        $req = $access -> prepare("UPDATE clients SET nom=?, telephone=?, mail=?, responsable=?, id_entreprise=? WHERE id_client = ?");
        $req -> execute(array($nom, $telephone, $mail, $responsable, $id_entreprise, $id));
        $req -> closeCursor();
    }
}

// fonction pour ajouter un client
function newClient($nom, $telephone, $mail, $responsable, $id_entreprise)
{
    if(require("connexion.php")) {
        $req = $access -> prepare("INSERT INTO clients (nom, telephone, mail, responsable, id_entreprise) VALUES(?,?,?,?,?)");
        $req -> execute(array($nom, $telephone, $mail, $responsable, $id_entreprise));
        $req -> closeCursor();
    }
}