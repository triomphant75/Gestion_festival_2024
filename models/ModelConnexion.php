<?php
session_start();
include '../cores/connexion.php';

if (isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Liste des noms de vos tables où vous souhaitez vérifier les informations de connexion
        $tables = array("accompagnateur", "auteur", "interprete", "etablissement", "admini");

        // Parcourir les tables et vérifier les informations de connexion dans chacune
        foreach ($tables as $table) {
            // Utilisation d'alias pour les colonnes email et mot de passe selon le nom de la table
            $emailColumn = "";
            $passwordColumn = "";
            switch ($table) {
                case "accompagnateur":
                    $emailColumn = "emailaccompagnateur";
                    $passwordColumn = "motdepasseaccompagnateur";
                    break;
                case "auteur":
                    $emailColumn = "emailauteur";
                    $passwordColumn = "motdepasseauteur";
                   
                    break;
                case "interprete":
                    $emailColumn = "emailinterprete";
                    $passwordColumn = "motdepasseinterprete";

                    break;
                case "etablissement":
                    $emailColumn = "emailetablissement";
                    $passwordColumn = "motdepasseetablissement";
                   
                    break;
                case "admini":
                    $emailColumn = "emailadmin";
                    $passwordColumn = "motdePasseadmin";
                   

                    break;
                default:
                    break;
            }

            // Requête SQL avec alias pour les colonnes
            $sql = "SELECT * FROM $table WHERE $emailColumn = ? AND $passwordColumn = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$email, $password]);
            $user = $stmt->fetch();



           
           // Si l'utilisateur est trouvé dans cette table, redirigez-le et arrêtez la boucle
           if ($user) {
            // Déterminer le rôle en fonction du nom de la table
            $role = '';
            switch ($table) {
                case "accompagnateur":
                    $role = "accompagnateur";
                    break;
                case "auteur":
                    $role = "auteur";
                    break;
                case "interprete":
                    $role = "interprete";
                    break;
                case "etablissement":
                    $role = "etablissement";
                    break;
                case "admini":
                    $role = "admin";
                    break;
                default:
                    // Si la table n'est pas associée à un rôle spécifique, définissez un rôle par défaut
                    $role = "default";
                    break;
            }

            // Stocke le rôle dans une variable de session
            $_SESSION['role'] = $role;

           
            // Rediriger l'utilisateur vers le tableau de bord approprié en fonction de son rôle
            switch ($role) {
                case "accompagnateur":
                    header('Location: ../views/dashboard.php');
                    break;
                case "auteur":
                    header('Location: ../views/dashboard.php');
                    break;
                case "interprete":
                    header('Location: ../views/dashboard.php');
                    break;
                case "etablissement":
                    header('Location: ../views/dashboard.php');
                    break;
                case "admin":
                    header('Location: ../views/dashboard.php');
                    break;
                default:
                    // Redirection par défaut vers le tableau de bord général
                    header('Location: ../views/dashboard.php');
                    break;
            }
            exit();
        }
    }

    

    // Si l'utilisateur n'est pas trouvé dans aucune des tables, affichez un message d'erreur
    $_SESSION['message']['text'] = "Une erreur s'est produite lors de la connexion";
    $_SESSION['message']['type'] = "danger";
    header('Location: ../views/PageConnexion.php');
    exit();
}
}
?>