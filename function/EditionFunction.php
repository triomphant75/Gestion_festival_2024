<?php
include '../cores/connexion.php';

function getEdition(){
    $sql="SELECT * FROM editions";
    $req= $GLOBALS['connexion']->prepare($sql);

    $req->execute();

    //retourne tout le resultat de la requete
    return $req->fetchAll();



}
?>