<?php
include '../cores/connexion.php';

function getIntervention($idintervention=null){

    if(!empty($idintervention)) { 
        $sql="SELECT * FROM intervention WHERE idintervention=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($idintervention));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM intervention";
    $req= $GLOBALS['connexion']->prepare($sql);

    $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
?>


