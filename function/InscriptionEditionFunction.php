<?php
include '../cores/connexion.php';

function getInscription($idinscription=null){

    if(!empty($idinscription)) { 
        $sql="SELECT * FROM inscription WHERE idinscription=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($idinscription));
        return $req->fetch(); // recupère la première valeur qu'il trouve 
    }
    else {
        $sql="SELECT * FROM inscription";
        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute();

        //retourne tout le resultat de la requete
        return $req->fetchAll();


    }
}

?>