<?php
include '../cores/connexion.php';

if (
    !empty($_POST['start_date'])
    && !empty($_POST['end_date'])
    && !empty($_POST['year'])
    && !empty($_POST['description'])
){
    $sql = "UPDATE editions  SET datedebuteedition=?, datefinedition=?, anneeedition=?, descriptionediton=?
    WHERE idedition=?";
          
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['year'],
        $_POST['description'],
        $_POST['idedition'] // Ajout de l'id de l'édition à modifier
    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "Édition modifiée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "Rien n'a été modifié";
        $_SESSION ['message'] ['type']= "warning";
    }

} else{
    $_SESSION ['message'] ['text']= "Une information obligatoire n'a pas été renseignée";
    $_SESSION ['message'] ['type']= "danger";
}

// Redirection vers la vue 
header('Location: ../views/AjoutEdition.php');
?>
