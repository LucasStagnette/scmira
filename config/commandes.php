<?php


// renvoie toutes les infos des clients par ordre de nom
function afficherClients()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT c.id_client, c.nom, c.telephone, c.mail, c.responsable, e.nom as e_nom FROM clients c, entreprises e where c.id_entreprise = e.id_entreprise ORDER BY c.nom");

        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

// affiche les infos d'un client
function afficherClient($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM clients WHERE id_client=$id");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

// fonction pour modifier les informations d'un client
function modifierClient($nom, $telephone, $mail, $responsable, $id_entreprise, $id)
{
    if (require("connexion.php")) {
        // requete pour modifier la table clients
        $req = $access->prepare("UPDATE clients SET nom=?, telephone=?, mail=?, responsable=?, id_entreprise=? WHERE id_client = ?");
        $req->execute(array($nom, $telephone, $mail, $responsable, $id_entreprise, $id));
        $req->closeCursor();
    }
}

// fonction pour ajouter un client
function newClient($nom, $telephone, $mail, $responsable, $id_entreprise)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO clients (nom, telephone, mail, responsable, id_entreprise) VALUES(?,?,?,?,?)");
        $req->execute(array($nom, $telephone, $mail, $responsable, $id_entreprise));
        $req->closeCursor();
    }
}

// fonction pour supprimer tous les clients appartenant à une entreprise
function deleteclients($id_entreprise)
{
    if (require("connexion.php")) {
        $req = $access->prepare("DELETE FROM clients WHERE id_entreprise=?");
        $req->execute(array($id_entreprise));
        $req->closeCursor();
    }
}

// si on recoit une demande de suppression d'un client
if (isset($_GET['action']) && $_GET['action'] == 'supprimerclient') {

    $idClient = $_GET['id_client'];

    // on verifie que ca provient du bouton supprimer
    if (isset($_GET['from_view']) && $_GET['from_view'] == 'true') {
        if (require("connexion.php")) {

            $req = $access->prepare("DELETE FROM clients WHERE id_client=?");
            $req->execute(array($idClient));
            header("Location: ../clients/view_clients.php");
        }
    } else {
        header("Location: ../clients/view_clients.php");
    }
}





// renvoie toutes les infos des entreprises
function afficherEntreprises()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM entreprises");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

// affiche les infos d'une entreprise
function afficherEntreprise($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM entreprises WHERE id_entreprise=$id");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

// fonction pour modifier les informations d'une entreprise
function modifierEntreprise($nom, $telephone, $adresse, $mail, $responsable, $id)
{
    if (require("connexion.php")) {
        // requete pour modifier la table entreprises
        $req = $access->prepare("UPDATE entreprises SET nom=?, telephone=?, adresse=?, mail=?, responsable=? WHERE id_entreprise = ?");
        $req->execute(array($nom, $telephone, $adresse, $mail, $responsable, $id));
        $req->closeCursor();
    }
}

// fonction pour ajouter une entreprise
function newEntreprise($nom, $telephone, $adresse, $mail, $responsable)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO entreprises (nom, telephone, adresse, mail, responsable) VALUES(?,?,?,?,?)");
        $req->execute(array($nom, $telephone, $adresse, $mail, $responsable));
        $req->closeCursor();
    }
}

// si on recoit une demande de suppression d'une entreprise
if (isset($_GET['action']) && $_GET['action'] == 'supprimerentreprise') {

    $idEntreprise = $_GET['id_entreprise'];

    // on verifie que ca provient du bouton supprimer
    if (isset($_GET['from_view']) && $_GET['from_view'] == 'true') {
        if (require("connexion.php")) {
            $req = $access->prepare("DELETE FROM entreprises WHERE id_entreprise=?");
            $req->execute(array($idEntreprise));
            header("Location: ../entreprises/view_entreprises.php");
        }
    } else {
        header("Location: ../entreprises/view_entreprises.php");
    }
}





// renvoie toutes les infos des collaborateurs
function afficherCollaborateurs()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM collaborateurs");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

// affiche les infos d'un collaborateur
function afficherCollaborateur($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM collaborateurs WHERE id_collab=$id");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

// fonction pour modifier les informations d'une entreprise
function modifierCollaborateur($nom, $prenom, $visa, $telephone, $statut, $id_collab)
{
    if (require("connexion.php")) {
        // requete pour modifier la table entreprises
        $req = $access->prepare("UPDATE collaborateurs SET nom=?, prenom=?, visa=?, telephone=?, statut=? WHERE id_collab = ?");
        $req->execute(array($nom, $prenom, $visa, $telephone, $statut, $id_collab));
        $req->closeCursor();
    }
}

// fonction pour ajouter une entreprise
function newCollaborateur($nom, $prenom, $visa, $telephone, $statut)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO collaborateurs (nom, prenom, visa, telephone, statut) VALUES(?,?,?,?,?)");
        $req->execute(array($nom, $prenom, $visa, $telephone, $statut));
        $req->closeCursor();
    }
}

// si on recoit une demande de suppression d'un collaborateur
if (isset($_GET['action']) && $_GET['action'] == 'supprimercollaborateur') {

    $idCollab = $_GET['id_collab'];

    // on verifie que ca provient du bouton supprimer
    if (isset($_GET['from_view']) && $_GET['from_view'] == 'true') {
        if (require("connexion.php")) {

            $req = $access->prepare("DELETE FROM collaborateurs WHERE id_collab=?");
            $req->execute(array($idCollab));
            header("Location: ../collaborateurs/view_collaborateurs.php");
        }
    } else {
        header("Location: ../collaborateurs/view_collaborateurs.php");
    }
}





// return True si la vanne existe, si elle n'existe pas return False
function verifVanne($repere)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT id_vanne FROM vannes WHERE repere=?");
        $req->execute(array($repere));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return !empty($data);
    }
}


// fonction pour créer et ajouter les informations de base de la vanne 
function newVanne($id_client, $unite, $contact, $produit, $temperature, $repere, $marque, $type, $nserie, $entree, $sortie, $pression, $date, $visa)
{
    if(require("connexion.php")) {
        $req = $access -> prepare("INSERT INTO vannes(client, unite, contact, repere, marque, type, nserie, dnentreesortie, pnentreesortie,produit, date, temperature, pressiontarage, visa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $req -> execute(array($id_client, $unite, $contact, $repere, $marque, $type, $nserie, $entree, $sortie, $produit, $date, $temperature, $pression, $visa));
        $req -> closeCursor();        
    }
}