<?php
include '../cores/connexion.php';

if (

    !empty($_POST['start_date'])
    && !empty($_POST['end_date'])
    && !empty($_POST['year'])
    && !empty($_POST['description'])
<<<<<<< HEAD
    && !empty($_POST['idedition'])
=======
    && !empty($_POST['id'])
>>>>>>> origin/main
){
    $sql = "UPDATE editions  SET datedebuteedition=?,datefinedition=? ,anneeedition=?,descriptionediton=?,
    WHERE idedition=?";
          
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['year'],
        $_POST['description'],
<<<<<<< HEAD
        $_POST['idedition']
=======
        $_POST['id']
>>>>>>> origin/main

    ));
    if ($req->rowCount()!=0){
        $_SESSION ['message'] ['text']= "edition modifié avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "rien n'a été modifié ";
        $_SESSION ['message'] ['type']= "warning";
    }

} else{
    $_SESSION ['message'] ['text']= "une information obligatoire non renseignée";
    $_SESSION ['message'] ['type']= "danger";
}


//redirection vers la vue 
header('Location: ../views/AjoutEdition.php');
 
?>
