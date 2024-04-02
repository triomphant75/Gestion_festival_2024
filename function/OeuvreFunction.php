<?php
include '../cores/connexion.php';

function getOeuvre($idoeuvre=null){

    if(!empty($idoeuvre)) {
        $sql="SELECT * FROM oeuvre WHERE idoeuvre=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($idoeuvre));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM oeuvre";
    $req= $GLOBALS['connexion']->prepare($sql);

    $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
?>