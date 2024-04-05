<?php
session_start();
include '../cores/connexion.php';

// Fonction pour vérifier si l'email appartient à une table spécifique
function is_email_in_table($email, $table, $emailColumn) {


$host = 'localhost'; // Ou l'adresse IP de votre serveur PostgreSQL
$dbname = 'SWAAM_FESTILIVRE';
$username = 'postgres';
$password = 'root';
    // Création d'une connexion PDO à votre base de données
    $connexion = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    // Préparation de la requête SQL
    $stmt = $connexion->prepare("SELECT COUNT(*) FROM $table WHERE $emailColumn = ?");
    
    // Exécution de la requête avec l'e-mail fourni comme paramètre
    $stmt->execute([$email]);
    
    // Récupération du nombre de lignes correspondantes
    $count = $stmt->fetchColumn();
    
    // Retourne true si le nombre de lignes est supérieur à zéro, ce qui signifie que l'email existe dans la table
    return $count > 0;
}

// Exemple d'utilisation :
$email = $_POST['email']; // Assurez-vous que vous récupérez correctement l'email à partir du formulaire de connexion

// Vérifiez dans quelle table l'email appartient et déduisez le rôle
if (is_email_in_table($email, 'auteur', 'emailauteur')) {
    $role = 'auteur';
} elseif (is_email_in_table($email, 'accompagnateur', 'emailaccompagnateur')) {
    $role = 'accompagnateur';
} elseif (is_email_in_table($email, 'interprete', 'emailinterprete')) {
    $role = 'interprete';
} elseif (is_email_in_table($email, 'etablissement', 'emailetablissement')) {
    $role = 'etablissement';
}elseif (is_email_in_table($email, 'admini', 'emailadmin')) {
    $role = 'commission';
}else {
    // Si l'email n'appartient à aucune des tables, l'utilisateur n'a pas de rôle défini
    $role = 'non_defini'; }

?>