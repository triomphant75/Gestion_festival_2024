<?php
include '../cores/connexion.php';

if (

    !empty($_POST['mailEtablissement'])
    && !empty($_POST['LoginEtablissement'])
    && !empty($_POST['pwdEtablissement'])
    && !empty($_POST['TypeEtablissement'])
    && !empty($_POST['NomEtablissement'])
    && !empty($_POST['AdresseEtablissement'])
    && !empty($_POST['NbreEtablissement'])
    && !empty($_POST['telEtablissement'])
    && !empty($_POST['PublicEtablissement'])
    && !empty($_POST['DateIEtablissement'])



  


){
    $sql = "INSERT INTO etablissement (emailetablissement, loginetablissement, motdepasseetablissement, typeetablissement, nometablissement, adresseetablissement, nombreparticipant, teletablissement,lepublic, dateinscriptionetablissement  )
            VALUES(?,?,?,?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['mailEtablissement'],
        $_POST['LoginEtablissement'],
        $_POST['pwdEtablissement'],
        $_POST['TypeEtablissement'],
        $_POST['NomEtablissement'],
        $_POST['AdresseEtablissement'],
        $_POST['NbreEtablissement'],
        $_POST['telEtablissement'],
        $_POST['PublicEtablissement'],
        $_POST['DateIEtablissement']
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
