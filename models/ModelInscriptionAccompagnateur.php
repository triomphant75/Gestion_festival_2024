<?php
include '../cores/connexion.php';

if (
    !empty($_POST['NomAccompagnateur'])
    && !empty($_POST['PrenomAccompagnateur'])
    && ! empty($_POST['loginAccompagnateur'])
    && !empty($_POST['PwdAccompagnateur']) 
    && !empty($_POST['EmailAccompagnateur'])
    && !empty($_POST['DateNAccompagnateur'])
    && !empty($_POST['AdresseAccompagnateur'])
    && !empty($_POST['TelAccompagnateur']) 
    && !empty($_POST['DateIAccompagnateur'])
   
    
){
    $sql = "INSERT INTO accompagnateur (nomaccompagnateur,prenomaccompagnateur,loginaccompagnateur, motdepasseaccompagnateur, emailaccompagnateur,datenaissanceacommpagnateur,adresseaccompagnateur,telacommpagnateur, dateinscriptionaccompagnateur )
            VALUES(?,?,?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['NomAccompagnateur'],
        $_POST['PrenomAccompagnateur'],
        $_POST['loginAccompagnateur'],
        $_POST['PwdAccompagnateur'],
        $_POST['EmailAccompagnateur'],
        $_POST['DateNAccompagnateur'],
        $_POST['AdresseAccompagnateur'],
        $_POST['TelAccompagnateur'],
        $_POST['DateIAccompagnateur']
       
       

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
