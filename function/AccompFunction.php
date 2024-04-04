<?php
include '../cores/connexion.php';
function getAccompagnateur($idaccompagnateur=null){

    if(!empty($idaccompagnateur)) { 
        $sql="SELECT * FROM accompagnateur WHERE idaccompagnateur=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($idaccompagnateur));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM accompagnateur";
    $req= $GLOBALS['connexion']->prepare($sql);

    $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
?>