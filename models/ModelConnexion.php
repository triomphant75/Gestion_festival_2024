<?php
include '../cores/connexion.php';
var_dump($_POST);

if (isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        
        $password = $_POST['password'];

        // Liste des noms de vos tables où vous souhaitez vérifier les informations de connexion
        $tables = array("accompagnateur", "auteur", "interprete", "etablissement", "admini");

        // Parcourir les tables et vérifier les informations de connexion dans chacune
        foreach ($tables as $table) {
            // Utilisation d'alias pour les colonnes email et mot de passe selon le nom de la table
            if ($table == "accompagnateur") {
                $emailColumn = "emailaccompagnateur";
                $passwordColumn = "motdepasseaccompagnateur";
            } elseif ($table == "auteur") {
                $emailColumn = "emailauteur";
                $passwordColumn = "motdepasseauteur";
            }elseif ($table == "interprete") {
                $emailColumn = "emailinterprete";
                $passwordColumn = "motdepasseinterprete";
            }
            elseif ($table == "etablissement") {
                $emailColumn = "emailetablissement";
                $passwordColumn = "motdeetablissement";
            }
            elseif ($table == "admini") {
                $emailColumn = "emailadmin";
                $passwordColumn = "motdepasseadmin";
            }

            // Requête SQL avec alias pour les colonnes
            $sql = "SELECT * FROM $table WHERE $emailColumn = ? AND $passwordColumn = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$email, $password]);
            $user = $stmt->fetch();

            // Si l'utilisateur est trouvé dans cette table, redirigez-le et arrêtez la boucle
            if ($user) {
                header('Location: ../views/dashboard.php');
                exit();
            }else{
                header('Location: ../views/PageConnexion.php');
            }
        }

        // Si l'utilisateur n'est pas trouvé dans aucune des tables, affichez un message d'erreur
    } if ($stmt->rowCount()!=0){
        $_SESSION ['message'] ['text']= " créée avec succès";
        $_SESSION ['message'] ['type']= "success";

    }else{
        $_SESSION ['message'] ['text']= "une erreur s'est produit lors de la connexion";
        $_SESSION ['message'] ['type']= "danger";
    }
    // Fonction pour vérifier si l'email appartient à une table spécifique
function is_email_in_table($email, $table, $emailColumn) {

    // Préparation de la requête SQL
    $stmt = $GLOBALS['connexion']->prepare("SELECT COUNT(*) FROM $table WHERE $emailColumn = ?");
    
    // Exécution de la requête avec l'e-mail fourni comme paramètre
    $stmt->execute([$email]);
    
    // Récupération du nombre de lignes correspondantes
    $count = $stmt->fetchColumn();
    
    // Retourne true si le nombre de lignes est supérieur à zéro, ce qui signifie que l'email existe dans la table
    return $count > 0;
}


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
}






?>
