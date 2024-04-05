<?php
include '../cores/connexion.php';
function getInterprete($idinterprete = null){

    if(!empty($idinterprete)) { 
        $sql = "SELECT * FROM interprete WHERE idinterprete=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($idinterprete));
        return $req->fetch();
    }
    else {
        $sql = "SELECT * FROM interprete";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        //retourne tout le resultat de la requete
        return $req->fetchAll();
    }
}
function getNomInterprete($nominterprete = null){

    if(!empty($nominterprete)) { 
        $sql = "SELECT * FROM interprete WHERE nominterprete=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($nominterprete));
        return $req->fetch();
    }
    else {
        $sql = "SELECT * FROM interprete";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        //retourne tout le resultat de la requete
        return $req->fetchAll();
    }
}
?>
