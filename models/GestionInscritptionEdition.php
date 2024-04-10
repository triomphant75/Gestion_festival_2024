<?php
include '../cores/connexion.php';

if (

    !empty($_POST['dateInscription'])
    && !empty($_POST['edition'])
    && !empty($_POST['acompagnateur'])
    && !empty($_POST['etablissement'])
    && !empty($_POST['interprete'])
    && !empty($_POST['auteur'])
){
    $sql = "INSERT INTO inscription (dateinscription, idedition ,idaccompagnateur , idetablissement,idinterprete,idauteur  ) 
    VALUES(?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['dateInscription'],
        $_POST['edition'],
        $_POST['acompagnateur'],
        $_POST['etablissement'],
        $_POST['interprete'],
        $_POST['auteur']
    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "Inscription effectuée ";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de l'inscription";
        $_SESSION ['message'] ['type']= "danger";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/InscriptionsEdition.php');
 
?>
