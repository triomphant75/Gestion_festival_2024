<?php
include "../cores/connexion.php";

if (

    !empty($_POST['nomAuteur'])
    && !empty($_POST['prenomAuteur'])
    && !empty($_POST['LoginAuteur'])
    && !empty($_POST['mdpAuteur'])
    && !empty($_POST['emailAuteur'])
    && !empty($_POST['datenaisAuteur'])
    && !empty($_POST['adresseAuteur'])
    && !empty($_POST['"TelAuteur'])
    && !empty($_POST['dateIAuteur'])
   

){
    $sql = "INSERT INTO auteur (nomauteur,prénomauteur,loginauteur,motdepasseauteur,emailauteur,datenaissanceauteur,telauteur,adresseauteur,dateinscription )
            VALUES(?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
    $_POST['nomAuteur'],
    $_POST['prenomAuteur'],
    $_POST['year'],
    $_POST['LoginAuteur'],
    $POST['mdpAuteur'],
    $_POST['emailAuteur'],
    $_POST['datenaisAuteur'],
    $_POST['adresseAuteur'],
    $_POST['"TelAuteur'],
    $_POST['dateIAuteur'],

    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "edition créée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de la création de l'édition";
        $_SESSION ['message'] ['type']= "danger";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/AjoutAuteur.php');
 

