<?php
include '../cores/connexion.php';

function getVoeux($idvoeux=null){

    if(!empty($idvoeux)) {
        $sql="SELECT * FROM voeux WHERE idvoeux=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($idvoeux));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM voeux";
    $req= $GLOBALS['connexion']->prepare($sql);

    $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
?>