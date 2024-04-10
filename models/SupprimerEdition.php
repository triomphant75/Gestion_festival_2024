<?php
include '../cores/connexion.php';

// Vérifier si l'ID de l'édition à supprimer est passé en GET
if (!empty($_GET['idedition'])) {
    // Préparer la requête de suppression
    $sql = "DELETE FROM editions WHERE idedition=?";
    $req = $connexion->prepare($sql);

    // Exécuter la requête de suppression en utilisant l'ID de l'édition
    $req->execute(array(
        $_GET['idedition']
    ));

    // Vérifier si des lignes ont été affectées (supprimées)
    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Édition supprimée avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Rien n'a été supprimé";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "ID de l'édition à supprimer non fourni";
    $_SESSION['message']['type'] = "danger";
}

// Redirection vers la vue
header('Location: ../views/ListeEditions.php');
?>
