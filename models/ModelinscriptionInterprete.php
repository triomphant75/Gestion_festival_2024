<?php
include '../cores/connexion.php';

if (

    !empty($_POST['NomInterprete'])
    && !empty($_POST['PrenomInterprete'])
    && ! empty($_POST['loginInterprete'])
    && !empty($_POST['PwdInterprete']) 
    && !empty($_POST['EmailIntreprete'])
    && !empty($_POST['DateNInterprete'])
    && !empty($_POST['AdresseInterprete'])
    && !empty($_POST['TelInterprete']) 
){
    $sql = "INSERT INTO interprete (nominterprete,prenominterprete,logininterprete,motdepasseinterprete,emailinterprete, datenaissanceinterprete, adresseinterprete, telinterprete  )
            VALUES(?,?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['NomInterprete'],
        $_POST['PrenomInterprete'],
        $_POST['loginInterprete'],
        $_POST['PwdInterprete'],
        $_POST['EmailIntreprete'],
        $_POST['DateNInterprete'],
        $_POST['AdresseInterprete'],
        $_POST['TelInterprete'],
    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "Interprete créée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de la création de l'Interprete";
        $_SESSION ['message'] ['type']= "danger";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/PageConnexion.php');
 
?>
