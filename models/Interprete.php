<?php
include '../cores/connexion.php';

if (
    !empty($_POST['nomInterprete'])
    && !empty($_POST['prenomInterprete'])
    && ! empty($_POST['loginInterprete'])
    && !empty($_POST['motDePassenterprete']) 
    && !empty($_POST['emailInterprete'])
    && !empty($_POST['dateNaissanceInterprete'])
    && !empty($_POST['adresseInterprete'])
    && !empty($_POST['telinterprete']) 
    && !empty($_POST['dateinscription'])
   
    
){
    $sql = "INSERT INTO interprete (nomInterprete,prenomInterprete,loginInterprete, motDePassenterprete, emailInterprete,dateNaissanceInterprete,adresseInterprete,telinterprete,dateInscriptionInterprete)
            VALUES(?,?,?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nomInterprete'],
        $_POST['prenomInterprete'],
        $_POST['loginInterprete'],
        $_POST['motDePasseInterprete'],
        $_POST['emailInterprete'],
        $_POST['dateNaissanceInterprete'],
        $_POST['adresseInterprete'],
        $_POST['telinterprete'],
        $_POST['dateinscription'],
       
       

    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "accompagnateur créée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de la création de l'accompagnateur";
        $_SESSION ['message'] ['type']= "danger";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/AjoutInterprete.php');
 
?>