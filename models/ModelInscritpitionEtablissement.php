<?php
include '../cores/connexion.php';

if (

    !empty($_POST['mailEtablissement'])
    && !empty($_POST['TypeEtablissement'])
    && !empty($_POST['NomEtablissement'])
    && !empty($_POST['AdresseEtablissement'])
    && !empty($_POST['pwdEtablissement'])
    && !empty($_POST['NbreEtablissement'])
    && !empty($_POST['telEtablissement'])
){
    $sql = "INSERT INTO etablissement (emailetablissement,typeetablissement,nometablissement,adresseetablissement,motdeetablissement, nombreparticipant, teletablissement )
            VALUES(?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['mailEtablissement'],
        $_POST['TypeEtablissement'],
        $_POST['NomEtablissement'],
        $_POST['AdresseEtablissement'],
        $_POST['pwdEtablissement'],
        $_POST['NbreEtablissement'],
        $_POST['telEtablissement'],

    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "etablissement créée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de la création de l'etablissement";
        $_SESSION ['message'] ['type']= "danger";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/PageConnexion.php');
 
?>
