<?php
include '../cores/connexion.php';

function getStatistique($idsauvegarde=null){

    if(!empty($idvoeux)) {
        $sql="SELECT * FROM sauvegarde WHERE idsauvegarde=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($idsauvegarde));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM sauvegarde";
    $req= $GLOBALS['connexion']->prepare($sql);

    $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
?>