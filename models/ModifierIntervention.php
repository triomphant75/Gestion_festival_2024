<?php
include '../cores/connexion.php';

if (
    !empty($_POST['DureeIntervention'])
    && !empty($_POST['DateFDntervention'])
    && ! empty($_POST['DateFIntervention'])
    && !empty($_POST['LieuIntervention']) 
    && !empty($_POST['EtatIntervention'])
    && !empty($_POST['EtablissementIntervention'])
    && !empty($_POST['InterpreteIntervention'])
    && !empty($_POST['AuteurIntervention']) 
    && !empty($_POST['AccompagnateurIntervention'])
    && !empty($_POST['EditionIntervention'])
   
    
){
    $sql = "UPDATE intervention 
        SET dureeintervention=?, 
            datedebutintervention=?, 
            datefinintervention=?, 
            lieuintervention=?, 
            etatintervention=?, 
            idetablissement=?, 
            idinterprete=?, 
            idauteur=?, 
            idaccompagnateur=?, 
            idedition=?
        WHERE idintervention=?";

    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['DureeIntervention'],
        $_POST['DateFDntervention'],
        $_POST['DateFIntervention'],
        $_POST['LieuIntervention'],
        $_POST['EtatIntervention'],
        $_POST['EtablissementIntervention'],
        $_POST['InterpreteIntervention'],
        $_POST['AuteurIntervention'],
        $_POST['AccompagnateurIntervention'],
        $_POST['EditionIntervention'],
        $_POST['idintervention'] // Ajout de l'id de l'édition à modifier
       
       

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
header('Location: ../views/AjoutIntervention.php');
 
?>