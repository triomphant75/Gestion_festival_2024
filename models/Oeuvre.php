<?php
include '../cores/connexion.php';

// Récupérer les valeurs saisies dans le formulaire
$titre = $_POST['titre_oeuvre'];
$edition = $_POST['edition'];
$description = $_POST['description'];
$public = $_POST['public_cible'];
$prix = $_POST['prix_litteraire'];
$annee = $_POST['annee_publication'];
$genre = $_POST['genre_litteraire'];
$auteurs = $_POST['auteur']; // Si plusieurs auteurs peuvent être sélectionnés, assurez-vous que $_POST['auteur'] est un tableau

try {
    // Requête SQL pour insérer une nouvelle œuvre dans la table "oeuvre"
    $sql = "INSERT INTO oeuvre (titre, editionoeuvre, descriptionoeuvre, publiccible, prixlitteraire, anneepublication, genrelitteraire) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Préparation de la requête
    $stmt = $connexion->prepare($sql);
    
    // Liaison des paramètres
    $stmt->bindParam(1, $titre);
    $stmt->bindParam(2, $edition);
    $stmt->bindParam(3, $description);
    $stmt->bindParam(4, $public);
    $stmt->bindParam(5, $prix);
    $stmt->bindParam(6, $annee);
    $stmt->bindParam(7, $genre);
    
    // Exécution de la requête
    $stmt->execute();
    
    // Récupérer l'ID de l'œuvre nouvellement insérée
    $idOeuvre = $connexion->lastInsertId();
    
    // Requête SQL pour insérer une entrée dans la table "AuteurOeuvre" pour chaque auteur sélectionné
    $sqlAuteurOeuvre = "INSERT INTO auteuroeuvre (idoeuvre, idAuteur) VALUES (?, ?)";
    $stmtAuteur = $connexion->prepare($sqlAuteurOeuvre);
    
    // Liaison des paramètres et exécution de la requête pour chaque auteur
    foreach ($auteurs as $idAuteur) {
        $stmtAuteur->execute([$idOeuvre, $idAuteur]);
    }
    
    echo "L'œuvre a été ajoutée avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$connexion = null;

// Redirection vers la page d'ajout d'oeuvre
header('Location: ../views/AjoutOeuvre.php');
?>