<?php
include '../cores/connexion.php';
function getEtablissement($idetablissement=null){

    if(!empty($$idetablissement)) { 
        $sql="SELECT * FROM etablissement WHERE $idetablissement=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($$idetablissement));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM etablissement";
    $req= $GLOBALS['connexion']->prepare($sql);

     $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
function getNomEtablissement($nometablissement=null){

    if(!empty($$nometablissement)) { 
        $sql="SELECT * FROM etablissement WHERE $nometablissement=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($$nometablissement));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM etablissement";
    $req= $GLOBALS['connexion']->prepare($sql);

     $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
?>