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


?>