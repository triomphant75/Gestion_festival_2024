
<?php
// A chaque fois qu'on se conecte à une session on appelle la fonction session_start() ( pour gérer l'affichage que l'inteface lié à la BD)
session_start();

$host = 'localhost'; // Ou l'adresse IP de votre serveur PostgreSQL
$dbname = 'SWAAM_FESTILIVRE';
$username = 'postgres';
<<<<<<< HEAD
$password = 'root';
=======
$password = '3004';
>>>>>>> origin/main

try {
    $connexion = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    // Configurer PDO pour afficher les erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
