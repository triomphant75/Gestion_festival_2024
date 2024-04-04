<?php
include '../cores/connexion.php';

if (
    !empty($_POST['NomEtablissement'])
    && ! empty($_POST['loginEtablissement'])
    && ! empty($_POST['loginEtablissement'])
    && !empty($_POST['PwdEtablissement']) 
    && !empty($_POST['typeEtablissement'])
    && !empty($_POST['AdresseEtablissement'])
    && !empty($_POST['TelEtablissement']) 
    && !empty($_POST['DateIInterprete'])
   
    
){
    $sql = "INSERT INTO etablissement (nomaccompagnateur,prenomaccompagnateur,loginaccompagnateur, motdepasseaccompagnateur, emailaccompagnateur,dateinscriptionacommpagnateur, datenaissanceacommpagnateur,adresseaccompagnateur,telacommpagnateur )
            VALUES(?,?,?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['NomInterprete'],
        $_POST['PrenomInterprete'],
        $_POST['loginInterprete'],
        $_POST['PwdInterprete'],
        $_POST['EmailInterprete'],
        $_POST['DateIInterprete'],
        $_POST['DateNInterprete'],
        $_POST['AdresseInterprete'],
        $_POST['TelInterprete'],
       
       

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
header('Location: ../views/PageConnexion.php');
 
?>