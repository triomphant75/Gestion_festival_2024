<?php
include '../cores/connexion.php';

function getEdition($idedition=null){

    if(!empty($idedition)) { 
        $sql="SELECT * FROM editions WHERE idedition=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($idedition));
        return $req->fetch(); // recupère la première valeur qu'il trouve 
    }
    else {
        $sql="SELECT * FROM editions";
        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute();

        //retourne tout le resultat de la requete
        return $req->fetchAll();


    }
}

function filterEditionsByAnnee($annee){

    // Requête SQL pour sélectionner les éditions par année
    $sql = "SELECT * FROM editions WHERE anneeedition = ?";
    $stmt = $GLOBALS['connexion']->prepare($sql);
    $stmt->execute([$annee]);
    $editions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les éditions filtrées
    return $editions;

    }


?>