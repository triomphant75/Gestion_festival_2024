<?php
include '../cores/connexion.php';
function getAuteurs($idauteur=null){

    if(!empty($$idauteur)) { 
        $sql="SELECT * FROM auteur WHERE $idauteur=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($$idauteur));
        return $req->fetch();
    }
    else {
    $sql="SELECT * FROM auteur";
    $req= $GLOBALS['connexion']->prepare($sql);

    $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();


    }
}
?>