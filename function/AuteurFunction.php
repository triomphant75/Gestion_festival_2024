<?php
include '../cores/connexion.php';

function getAuteur($nomauteur=null){

    if(!empty($nomauteur)) { 
        $sql="SELECT * FROM auteur WHERE nomauteur=?";

        $req= $GLOBALS['connexion']->prepare($sql);

        $req->execute(array($nomauteur));
        return $req->fetch(); // recupère la première valeur qu'il trouve 
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