<?php
include "../cores/connexion.php";

if (

    !empty($_POST['start_date'])
    && !empty($_POST['end_date'])
    && !empty($_POST['year'])
    && !empty($_POST['description'])
){
    $sql = "INSERT INTO editions (datedebuteedition,datefinedition,anneeedition,descriptionediton )
            VALUES(?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['year'],
        $_POST['description'],

    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "auteur créée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de la création de l'auteur";
        $_SESSION ['message'] ['type']= "danger";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/AjoutAuteur.php');
 

