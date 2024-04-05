<?php
include '../cores/connexion.php';

if (

    !empty($_POST['NomAuteur'])
    && !empty($_POST['PrenomAuteur'])
    && !empty($_POST['LoginAuteur'])
    && !empty($_POST['PwdAuteur']) 
    && !empty($_POST['EmailAuteur'])
    && !empty($_POST['DateNAuteur'])
    && !empty($_POST['TelAuteur'])
    && !empty($_POST['AdresseAuteur'])
    && !empty($_POST['DateIAuteur'])
){
    $sql = "INSERT INTO auteur (nomauteur,prénomauteur,loginauteur, motdepasseauteur, emailauteur , datenaissanceauteur, telauteur, adresseauteur, dateinscriptionauteur  )
            VALUES(?,?,?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['NomAuteur'],
        $_POST['PrenomAuteur'],
        $_POST['LoginAuteur'],
        $_POST['PwdAuteur'],
        $_POST['EmailAuteur'],
        $_POST['DateNAuteur'],
        $_POST['TelAuteur'],
        $_POST['AdresseAuteur'],
        $_POST['DateIAuteur']

    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "Auteur créée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de la création de l'Auteur";
        $_SESSION ['message'] ['type']= "danger";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/PageConnexion.php');
 
?>
